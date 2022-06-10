<?php

namespace App\Http\Controllers;

use App\Models\EnvType;
use App\Models\Method;
use App\Models\MethodType;
use App\Models\Protocol;
use App\Models\sidesync\MetaSync;
use App\Models\Specie;
use App\Models\TrapType;
use App\Models\VegetType;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function insert(Request $request) {
        $data = $request->all();
        $metaSync = new MetaSync($data);

        foreach ($metaSync->envTypes as $key => $value) {
            $newEnvType = new EnvType($value);
            EnvType::create(json_decode($newEnvType, true));
        }

        foreach ($metaSync->methods as $key => $value) {
            $newMethod = new Method($value);
            Method::create(json_decode($newMethod, true));
        }

        foreach ($metaSync->methodTypes as $key => $value) {
            $newMethodType = new MethodType($value);
            MethodType::create(json_decode($newMethodType, true));
        }

        foreach ($metaSync->protocols as $key => $value) {
            $newProtocol = new Protocol($value);
            Protocol::create(json_decode($newProtocol, true));
        }

        foreach ($metaSync->species as $key => $value) {
            $newSpecie = new Specie($value);
            $specie = Specie::where("speciesCode", $newSpecie->speciesCode);
            if ($specie != null) {
                $specie->update($newSpecie);
            } else {
                Specie::create(json_decode($newSpecie, true));
            }
        }

        foreach ($metaSync->trapTypes as $key => $value) {
            $newTrapType = new TrapType($value);
            TrapType::create(json_decode($newTrapType, true));
        }

        foreach ($metaSync->vegetTypes as $key => $value) {
            $newVegetType = new VegetType($value);
            VegetType::create(json_decode($newVegetType, true));
        }

        return response("FUNGUJE", 200);
    }

    public function getData($unixTime) {
        $myDate = gmdate("Y-m-d\TH:i:s\Z", $unixTime);

        $metaSync = new MetaSync();

        $metaSync->envTypes = EnvType::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->methods = Method::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->methodTypes = MethodType::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->protocols = Protocol::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->species = Specie::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->trapTypes = TrapType::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        $metaSync->vegetTypes = VegetType::where("created_at", '>=', $myDate)
            ->orWhere("updated_at", '>=', $myDate)
            ->get();

        return response()->json($metaSync);
    }
}
