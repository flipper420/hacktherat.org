<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Point extends Model
{
	public $fillable = ['user_id', 'points', 'reason', 'direction'];

	public function users()
	{
		return $this->hasMany('App\Models\User');
	}

	public function addReward($uid, $reward, $reason)
	{
		Point::create(['user_id' => $uid,
		               'points'  => $reward,
		               'reason'  => $reason,
		]);
	}

	public function wrongPassword($uid)
	{
		Point::create(['user_id' => $uid,
		               'points'  => -100,
		               'reason'  => 'Wrong password entered.',
		]);
	}
}
