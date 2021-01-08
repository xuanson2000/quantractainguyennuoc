<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ollayer extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'web_ollayers';

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
        'map_id',
        'group_id',
        'layer_name',
        'layer_title',
        'description',
        'opacity',
        'source',
        'visible',
        'minxextent',
        'minyextent',
        'maxxextent',
        'maxyextent',
        'zindex',
        'minresolution',
        'maxresolution',
        'delete_at'
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
     * Get the map_id for this model.
     */
    public function map_id()
    {
        return $this->belongsTo('App\Models\Map','id');
    }

    /**
     * Get the group_id for this model.
     */
    public function group_id()
    {
        return $this->belongsTo('App\Models\LayerGroup','id');
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
