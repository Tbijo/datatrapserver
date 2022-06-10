<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'projectName',
        'deviceID',
        'numLocal',
        'numMice',
        'projectStart'
    ];

    protected $hidden = [
        'projectId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'project';

    protected $primaryKey = 'projectId';

    public function sessions() {
        return $this->hasMany(Session::class, 'projectID', 'projectId');
    }
}
