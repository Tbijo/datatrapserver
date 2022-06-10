<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable = [
            'occasion',
            'deviceID',
            'localityID',
            'sessionID',
            'methodID',
            'methodTypeID',
            'trapTypeID',
            'envTypeID',
            'vegetTypeID',
            'gotCaught',
            'numTraps',
            'numMice',
            'temperature',
            'weather',
            'leg',
            'note',
            'occasionStart'
    ];

    protected $hidden = [
        'occasionId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'occasion';

    protected $primaryKey = 'occasionId';

    public function mice() {
        return $this->hasMany(Mouse::class, 'occasionID', 'occasionId');
    }

    public function session() {
        return $this->belongsTo(Session::class, 'sessionID', 'sessionId');
    }

    public function locality() {
        return $this->belongsTo(Locality::class, 'localityID', 'localityId');
    }
}
