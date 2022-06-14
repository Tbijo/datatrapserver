<?php

namespace App\Http\Controllers;

use App\Models\imagesync\ImageSync;
use App\Models\MouseImage;
use App\Models\OccasionImage;
use App\Models\SpecieImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function insert(Request $request)
    {// TODO Mozno bude treba plaknut alebo vytiahnut file lebo neni stlpec
        $data = $request->all();
        $imageSync = new ImageSync($data);

        foreach ($imageSync->mouseImages as $key => $value) {
            $newMouseImage = new MouseImage($value);

            $path = Storage::putFileAs('mouse', $newMouseImage->file, $newMouseImage->imgName);
            $newMouseImage->path = $path;

            $mouseImage = MouseImage::where("uniqueCode", $newMouseImage->uniqueCode)->first();
            if ($mouseImage != null) {
                $mouseImage->update(json_decode($mouseImage, true));
            } else {
                MouseImage::create(json_decode($newMouseImage, true));
            }
        }

        foreach ($imageSync->occasionImages as $key => $value) {
            $newOccasionImage = new OccasionImage($value);

            $path = Storage::putFileAs('occasion', $newOccasionImage->file, $newOccasionImage->imgName);
            $newOccasionImage->path = $path;

            $occasionImage = OccasionImage::where("uniqueCode", $newOccasionImage->uniqueCode)->first();
            if ($occasionImage != null) {
                $occasionImage->update(json_decode($newOccasionImage, true));
            } else {
                OccasionImage::create(json_decode($newOccasionImage, true));
            }
        }

        foreach ($imageSync->specieImages as $key => $value) {
            $newSpecieImage = new SpecieImage($value);

            $path = Storage::putFileAs('specie', $newSpecieImage->file, $newSpecieImage->imgName);
            $newSpecieImage->path = $path;

            $specieImage = SpecieImage::where("uniqueCode", $newSpecieImage->uniqueCode)->first();
            if ($specieImage != null) {
                $specieImage->update(json_decode($newSpecieImage, true));
            } else {
                SpecieImage::create(json_decode($newSpecieImage, true));
            }
        }

        return response("", 200);
    }
}
