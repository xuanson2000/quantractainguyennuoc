<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MonitoringNetwork;

class MonitoringWell extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'monitoring_well';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'gid';

    public function regionName(){
        return $this->belongsTo(MonitoringNetwork::class, 'region','id');
    }
}
