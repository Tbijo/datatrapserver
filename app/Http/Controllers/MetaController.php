<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function insert(Request $request) {
        return response("INSERT", 200);
    }

    public function getData($unixTime) {
        return response("GetData", 200);
    }
}
