<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function insert(Request $request) {
        return response("INSERT", 200);
    }
}
