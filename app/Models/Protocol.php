<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $fillable = [
        'protocolName'
    ];

    protected $hidden = [
        'protocolId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'protocol';

    protected $primaryKey = 'protocolId';
}
