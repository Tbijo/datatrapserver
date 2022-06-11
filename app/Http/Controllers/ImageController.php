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
            $newMouseImage = new MouseImage($value);
            $mouseImage = MouseImage::where("uniqueCode", $newMouseImage->uniqueCode)->first();
            if ($mouseImage != null) {
                $mouseImage->update(json_decode($mouseImage, true));
            } else {
                MouseImage::create(json_decode($newMouseImage, true));
            }
        }

        foreach($imageSync->occasionImages as $key => $value) {
            $newOccasionImage = new OccasionImage($value);
            $occasionImage = OccasionImage::where("uniqueCode", $newOccasionImage->uniqueCode)->first();
            if ($occasionImage != null) {
                $occasionImage->update(json_decode($newOccasionImage, true));
            } else {
                OccasionImage::create(json_decode($newOccasionImage, true));
            }
        }

        foreach($imageSync->specieImages as $key => $value) {
            $newSpecieImage = new SpecieImage($value);
            $specieImage = SpecieImage::where("uniqueCode", $newSpecieImage->uniqueCode)->first();
            if ($specieImage != null) {
                $specieImage->update(json_decode($newSpecieImage, true));
            } else {
                SpecieImage::create(json_decode($newSpecieImage, true));
            }
        }

        if ($request->hasFile("fileImages")) {
            foreach($imageSync->fileImages as $fileImage) {
                // storing files
            }
        }

        return response("Funguje", 200);
    }
}
