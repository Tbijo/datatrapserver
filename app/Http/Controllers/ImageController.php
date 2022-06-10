<?php

namespace App\Http\Controllers;

use App\Models\imagesync\ImageSync;
use App\Models\MouseImage;
use App\Models\OccasionImage;
use App\Models\SpecieImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function insert(Request $request) {
        $data = $request->all();
        $imageSync = new ImageSync($data);

        foreach($imageSync->mouseImages as $key => $value) {
            $mouseImage = new MouseImage($value);
            MouseImage::create(json_decode($mouseImage, true));
        }

        foreach($imageSync->occasionImages as $key => $value) {
            $occasionImage = new OccasionImage($value);
            OccasionImage::create(json_decode($occasionImage, true));
        }

        foreach($imageSync->specieImages as $key => $value) {
            $specieImage = new SpecieImage($value);
            SpecieImage::create(json_decode($specieImage, true));
        }

        if ($request->hasFile("fileImages")) {
            foreach($imageSync->fileImages as $fileImage) {
                // storing files
            }
        }

        return response("Funguje", 200);
    }
}
