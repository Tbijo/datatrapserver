<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\mainSync\LocOccLMouse;
use App\Models\mainSync\SesLOLM;
use App\Models\mainSync\SyncClass;
use App\Models\Mouse;
use App\Models\Occasion;
use App\Models\Project;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{// TODO Chyba bude v json_decode lebo si pyta JSON ako String nie ako Object

    public function insert(Request $request) {
        // dlzka tyzdna v sec
        $week = 604800;
        // vytiahnut pole SyncClass
        $data = $request->all();
        // prechadzat postupne po kazdom SyncClass
        // rozbalovat a (ukladat alebo updatovat) projekty
        // nakonci vytiahnut $listSesLOLM a dalej rozbalovat
        foreach ($data as $key => $value) {
            $syncClass = new SyncClass($value);
            // ziskat project
            $newProject = new Project($syncClass->prj);
            // overit ci uz je project v databaze
            $project = Project::where("projectName", $newProject->projectName)->first();
            $projectID = 0;
            if ($project != null) {
                // ak je v databaze tak update
                $project->update(json_decode($newProject, true));
                $projectID = $project->projectId;
            } else {
                // ak v databaze nie je vlozit
                $thisProject = Project::create(json_decode($newProject, true));
                $projectID = $thisProject->projectId;
            }

            // postupne prechadzat SesLOLM
            // rozbalovat a (ukladat alebo updatovat) sessiony
            // nakonci vytiahnut $listLOLM a dalej rozbalovat
            $listSesLOLM = $syncClass->listSesLOLM;
            foreach ($listSesLOLM as $key1 => $value1) {
                $sesLOLM = new SesLOLM($value1);
                // ziskat Session
                $newSession = new Session($sesLOLM->ses);
                // overit ci uz sa nachadza v databaze pod danym projectom
                $session = Session::where("sessionStart", $newSession->sessionStart)
                    ->where("projectID", $projectID)
                    ->first();

                $newSession->projectID = $projectID;
                $sessionID = 0;
                if ($session != null) {
                    // ak session je tak update
                    $session->update(json_decode($newSession, true));
                    $sessionID = $session->sessionId;
                } else {
                    // ak neni tak najdeme k nej najblizsiu v ramci tyzdna
                    $nearestSession = DB::table('session')
                        ->where("projectID", $projectID)
                        ->groupBy("sessionId")
                        ->havingRaw("MIN(ABS(\"sessionStart\" - $newSession->sessionStart)) <= $week")
                        ->first();
                    if ($nearestSession != null) {
                        // ak najblizsia v ramci tyzdna existuje zjednotime
                        $nearestSession->update(json_decode($newSession, true));
                        $sessionID = $nearestSession->sessionId;
                    } else {
                        // ak taka neni tak ju len vytvorime
                        $thisSession = Session::create(json_decode($newSession, true));
                        $sessionID = $thisSession->sessionId;
                    }
                }
                // postupne prechadzat $listLOLM
                // rozbalovat a (ukladat alebo updatovat) locality a occasiony
                // nakonci vytiahnut $listMouse prejst a ukladat
                $listLOLM = $sesLOLM->listLOLM;
                foreach ($listLOLM as $key2 => $value2) {
                    $locOccLMouse = new LocOccLMouse($value2);
                    // ziskat lokalitu
                    $newLocality = new Locality($locOccLMouse->loc);
                    // najst ju v databaze
                    $locality = Locality::where("localityName", $newLocality->localityName)->first();

                    $localityID = 0;
                    if ($locality != null) {
                        // ak je v databaze tak update
                        $locality->update(json_decode($newLocality, true));
                        $localityID = $locality->localityId;
                    } else {
                        // ak neni tak create
                        $thisLocality = Locality::create(json_decode($newLocality, true));
                        $localityID = $thisLocality->localityId;
                    }

                    // ziskat occasion
                    $newOccasion = new Occasion($locOccLMouse->occ);
                    // ci je v databaze v ramci session
                    $occasion = Occasion::where("occasionStart", $newOccasion->occasionStart)
                        ->where("sessionID", $sessionID)
                        ->first();

                    $newOccasion->sessionID = $sessionID;
                    $newOccasion->localityID = $localityID;
                    $occasionID = 0;
                    if ($occasion != null) {
                        // ak je tak update
                        $occasion->update(json_decode($newOccasion, true));
                        $occasionID = $occasion->occasionId;
                    } else {
                        // ak neni tak create
                        $thisOccasion = Occasion::create(json_decode($newOccasion, true));
                        $occasionID = $thisOccasion->occasionId;
                    }

                    // vytahovat mysi
                    // skontrolovat ci uz su
                    // create a update
                    $listMouse = $locOccLMouse->listMouse;
                    foreach ($listMouse as $key3 => $value3) {
                        // ziskat mys
                        $newMouse = new Mouse($value3);
                        // najst v databaze v ramci Occasion
                        $mouse = Mouse::where("mouseCaught", $newMouse->mouseCaught)
                            ->where("occasionID", $occasionID)
                            ->first();

                        $newMouse->occasionID = $occasionID;
                        $newMouse->localityID = $localityID;
                        if ($mouse != null) {
                            // ak je tak update
                            $mouse->update(json_decode($newMouse, true));
                        } else {
                            // ak neni tak create
                            Mouse::create(json_decode($newMouse, true));
                        }
                    }
                }
            }
        }
        // ide
        return response("FUNGUJE", 200);
    }

    public function getData($unixTime) {
        // zmenit unixTime na datumFormat
        $myDate = gmdate("Y-m-d\TH:i:s\Z", $unixTime);

        // zohnat nove a zmenene mysi
        $mice = Mouse::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        // roztriedit mysi podla occasionID
        $listSortedMouse = [];
        foreach ($mice as $mouse) {
            $listSortedMouse[$mouse->occasionID][] = $mouse;
        }

        // z kazdej skupiny vyhladat Occasion a podla nej lokalitu
        // a roztriedid ich podla sessionID
        $listLocOccLMouse = [];
        foreach ($listSortedMouse as $key => $value) {
            $locOccLMouse = new LocOccLMouse();
            $occasion = Occasion::where("occasionId", $key)->first();
            $locality = Locality::where("localityId", $occasion->localityID)->first();
            $locOccLMouse->loc = $locality;
            $locOccLMouse->occ = $occasion;
            $locOccLMouse->listMouse = $value;
            $listLocOccLMouse[$occasion->sessionID][] = $locOccLMouse;
        }

        // z kazdej skupiny ziskat Session
        // a podla projectID ich roztriedid
        $listSesLOLM = [];
        foreach ($listLocOccLMouse as $key => $value) {
            $sesLOLM = new SesLOLM();
            $session = Session::where("sessionId", $key)->first();
            $sesLOLM->ses = $session;
            $sesLOLM->listLOLM = $value;
            $listSesLOLM[$session->projectID][] = $sesLOLM;
        }

        // z kazdej skupiny vybrat project
        // a vytvorit pole zaznamov
        $listSyncClass = [];
        foreach ($listSesLOLM as $key => $value) {
            $syncClass = new SyncClass();
            $project = Project::where("projectId", $key)->first();
            $syncClass->prj = $project;
            $syncClass->listSesLOLM = $value;
            $listSyncClass[] = $syncClass;
        }

        //ide
        return response()->json($listSyncClass);
    }
}
