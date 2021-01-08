<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'web_maps';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'map_name',
                  'map_title',
                  'map_abstract',
                  'extent_minx',
                  'extent_miny',
                  'extent_maxx',
                  'extent_maxy',
                  'status',
                  'unit',
                  'size_x',
                  'size_y',
                  'proj',
                  'web_minscale',
                  'web_maxscale'
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
     * Get the proj for this model.
     */
    public function proj()
    {
        return $this->belongsTo('App\Models\Projection','proj_id');
    }

    /**
     * Set the delete_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setDeleteAtAttribute($value)
    {
        $this->attributes['delete_at'] = !empty($value) ? date($this->getDateFormat(), strtotime($value)) : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return date('j/n/Y H:i', strtotime($value));
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('j/n/Y H:i', strtotime($value));
    }

    /**
     * Get delete_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeleteAtAttribute($value)
    {
        return date('j/n/Y H:i', strtotime($value));
    }

}
