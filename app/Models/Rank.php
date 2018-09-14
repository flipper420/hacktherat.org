<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $guarded = [];

    public $timestamps = false; 
    
    public function users()
    {
    	return $this->belongToMany('App\Models\Users');
    }

    /**
     * Scope a query to only include ranks of a given name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereName($query, $name)
    {
    	return $query->where('name', $name);
    }
}
