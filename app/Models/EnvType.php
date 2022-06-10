<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvType extends Model
{
    protected $fillable = [
        'envTypeName',
    ];

    protected $hidden = [
        'envTypeId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'envtype';

    protected $primaryKey = 'envTypeId';
}
