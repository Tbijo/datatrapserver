<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccasionImage extends Model
{
    protected $fillable = [
        'imgName',
        'path',
        'note',
        'occasionID',
        'deviceID',
        'uniqueCode',
        'file'
    ];

    protected $hidden = [
        'occasionImgId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'occasionimage';

    protected $primaryKey = 'occasionImgId';
}
