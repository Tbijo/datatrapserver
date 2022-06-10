<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $fillable = [
        'methodName',
    ];

    protected $hidden = [
        'methodId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'method';

    protected $primaryKey = 'methodId';
}
