<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecieImage extends Model
{
    protected $fillable = [
        'imgName',
        'path',
        'note',
        'specieID',
        'deviceID',
        'imageCreated'
    ];

    protected $hidden = [
        'specieImgId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'specieimage';

    protected $primaryKey = 'specieImgId';
}
