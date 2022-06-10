<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $fillable = [
        'mouseIid',
        'code',
        'deviceID',
        'primeMouseID',
        'speciesID',
        'protocolID',
        'occasionID',
        'localityID',
        'trapID',
        'sex',
        'age',
        'gravidity',
        'lactating',
        'sexActive',
        'weight',
        'recapture',
        'captureID',
        'body',
        'tail',
        'feet',
        'ear',
        'testesLength',
        'testesWidth',
        'embryoRight',
        'embryoLeft',
        'embryoDiameter',
        'MC',
        'MCright',
        'MCleft',
        'note',
        'mouseCaught'
    ];

    protected $hidden = [
        'mouseId',
        'created_at',
        'updated_at'
    ];

    protected $table = 'mouse';

    protected $primaryKey = 'mouseId';

    public function occasion()
    {
        return $this->belongsTo(Occasion::class, 'occasionID', 'occasionId');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'localityID', 'localityId');
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class, 'speciesID', 'speciesId');
    }

    public function protocol()
    {
        return $this->belongsTo(Protocol::class, 'protocolID', 'protocolId');
    }
}
