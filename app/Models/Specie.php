<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = [
        'speciesCode',
        'fullName',
        'synonym',
        'authority',
        'description',
        'isSmallMammal',
        'upperFingers',
        'minWeight',
        'maxWeight',
        'bodyLength',
        'tailLength',
        'feetLengthMin',
        'feetLengthMax',
        'note'
    ];

    protected $hidden = [
        'specieId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'specie';

    protected $primaryKey = 'specieId';
}
