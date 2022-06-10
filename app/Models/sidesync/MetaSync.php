<?php

namespace App\Models\sidesync;

use Illuminate\Database\Eloquent\Model;

class MetaSync extends Model
{
    protected $fillable = ['envTypes', 'methods', 'methodTypes', 'protocols', 'species', 'trapTypes', 'vegetTypes'];
}
