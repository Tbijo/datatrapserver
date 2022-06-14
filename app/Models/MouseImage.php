<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouseImage extends Model
{
    protected $fillable = [
        'imgName',
        'path',
        'note',
        'mouseID',
        'deviceID',
        'uniqueCode',
        'file'
    ];

    protected $hidden = [
        'mouseImgId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'mouseimage';

    protected $primaryKey = 'mouseImgId';
}
