<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrapType extends Model
{
    protected $fillable = [
        'trapTypeName'
    ];

    protected $hidden = [
        'trapTypeId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'traptype';

    protected $primaryKey = 'trapTypeId';
}
