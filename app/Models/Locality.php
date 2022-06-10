<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = [
        'localityName',
        'xA',
        'yA',
        'xB',
        'yB',
        'numSessions',
        'note'
    ];

    protected $hidden = [
        'localityId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'locality';

    protected $primaryKey = 'localityId';
}
