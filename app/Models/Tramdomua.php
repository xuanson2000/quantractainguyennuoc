<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramdomua extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tramdomua';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'gid';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'gid',
                  'tt',
                  'tentram',
                  'diadanh',
                  'x',
                  'y',
                  'geom',
                  'tinh',
                  'huyen',
                  'xa',
                  'ghichu',
                  'sohieu',
                  'mota'
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
