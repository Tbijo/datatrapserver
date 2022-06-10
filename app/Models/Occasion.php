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

    public function method() {
        return $this->belongsTo(Method::class, 'methodID', 'methodId');
    }

    public function methodType() {
        return $this->belongsTo(MethodType::class, 'methodTypeID', 'methodTypeId');
    }

    public function trapType() {
        return $this->belongsTo(TrapType::class, 'trapTypeID', 'trapTypeId');
    }

    public function envType() {
        return $this->belongsTo(EnvType::class, 'envTypeID', 'envTypeId');
    }

    public function vegetType() {
        return $this->belongsTo(VegetType::class, 'vegetTypeID', 'vegetTypeId');
    }
}
