<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringNetwork extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'monitoring_network';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'gid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'id',
                  'network_name',
                  'network_code',
                  'geom'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}
