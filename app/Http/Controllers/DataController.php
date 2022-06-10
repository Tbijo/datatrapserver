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

class DataController extends Controller
{
    public function insert(Request $request) {
//        $data = $request->all();
//        $project = new Project();
//        $author = Author::create(json_decode($data));
//        $author->update($request->all());
//        foreach ($data as $key => $value) {
//            foreach ($value as $mKey => $mValue) {
//                json_decode($value);
//            }
//        }
        return response("INSERT", 200);
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

        $listSyncClass = [];
        foreach ($listSesLOLM as $key => $value) {
            $syncClass = new SyncClass();
            $project = Project::where("projectId", $key)->first();
            $syncClass->prj = $project;
            $syncClass->listSesLOLM = $value;
            $listSyncClass[] = $syncClass;
        }

        //return response("GetData", 200);
        return response()->json($listSyncClass);
    }
}
