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

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'cat_order'
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
     * Get the parent for this model.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Category','parent_id');
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

}
