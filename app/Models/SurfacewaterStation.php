<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurfacewaterStation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surfacewater_station';

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
                  'matram',
                  'tentram',
                  'tensong',
                  'luuvucsong',
                  'xa',
                  'huyen',
                  'tinh',
                  'toadox',
                  'toadoy',
                  'dientichtn',
                  'thongsoqt',
                  'geom',
                  'ngayqt',
                  'capquanly',
                  'mota',
                  'docaoz'
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
     * Set the ngayqt.
     *
     * @param  string  $value
     * @return void
     */
    public function setNgayqtAttribute($value)
    {
        $this->attributes['ngayqt'] = !empty($value) ? date($this->getDateFormat(), strtotime($value)) : null;
    }

    /**
     * Get ngayqt in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getNgayqtAttribute($value)
    {
        return date('j/n/Y H:i', strtotime($value));
    }

}
