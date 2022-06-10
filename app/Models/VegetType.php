<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VegetType extends Model
{
    protected $fillable = [
        'vegetTypeName'
    ];

    protected $hidden = [
        'vegetTypeId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'vegettype';

    protected $primaryKey = 'vegetTypeId';
}
