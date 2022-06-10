<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'session',
        'deviceID',
        'projectID',
        'numOcc',
        'sessionStart'
    ];

    protected $hidden = [
        'sessionId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'session';

    protected $primaryKey = 'sessionId';

    public function occasions() {
        return $this->hasMany(Occasion::class, 'sessionID', 'sessionId');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'projectID', 'projectId');
    }
}
