<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatistic extends Model
{
	protected $fillable = ['user_id', 'rank_id', 'points', 'experience'];
	public $table       = 'userstats';
	public $timestamps  = true;

	public function users
	{
		return $this->belongsToMany('App\Models\User');
	}

	public function rank
	{
		return $this->hasOne('App\Models\Rank');
	}

}
