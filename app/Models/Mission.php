<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug', 'difficulty', 'url', 'img_url'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}