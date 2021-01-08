<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteWater extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'xathai';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'xt_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'xt_id',
                  'id_dks',
                  'tennguonthai',
                  'luuluong',
                  'xt_tructiep',
                  'xt_daxuly',
                  'noitiepnhan',
                  'dotrong',
                  'mau',
                  'mui',
                  'loaihinh',
                  'sohieu_dks',
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
    
    /**
     * Get the xt for this model.
     */
    public function xt()
    {
        return $this->belongsTo('App\Models\Xt','xt_id');
    }



}
