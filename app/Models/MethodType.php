<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodType extends Model
{
    protected $fillable = [
        'methodTypeName',
    ];

    protected $hidden = [
        'methodTypeId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'methodtype';

    protected $primaryKey = 'methodTypeId';
}
