<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'web_articles';

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
                  'author',
                  'category_id',
                  'network_id',
                  'basin_id',
                  'title',
                  'seo_title',
                  'excerpt',
                  'content',
                  'image',
                  'slug',
                  'meta_description',
                  'meta_keywords',
                  'article_status',
                  'featured',
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
     * Get the category for this model.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
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
