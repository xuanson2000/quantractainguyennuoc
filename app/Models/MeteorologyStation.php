<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeteorologyStation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meteorology_station';

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
                  'gid',
                  'matram',
                  'tentram',
                  'diadanh',
                  'tentinh',
                  'loai',
                  'bucxa',
                  'ktnn',
                  'giamsatbdk',
                  'qtkttc',
                  'tkvt',
                  'pilotdogiotrencao',
                  'ozonbxct',
                  'radathoitiet',
                  'dinhviset',
                  'dogiocatlop',
                  'qtmthienco',
                  'qtmtquyhoach',
                  'daco',
                  'quyhoach',
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
