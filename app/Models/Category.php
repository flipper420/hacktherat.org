<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug', 'type'];

    /**
     * Mission Relationship
     * @return void
     */
    public function missions()
    {
        return $this->hasMany('App\Models\Mission');
    }

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
    public function getRouteKeyName() 
    {
    	return 'slug';
    }

    /**
     * Scope a query to only include category of type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereType($query, $type)
    {
        return $query->where('type', $type);
    }
}
