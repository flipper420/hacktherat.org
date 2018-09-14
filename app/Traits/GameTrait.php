<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Relations\Relation;

trait GameTrait
{



	 /**
     * These are the User's Points relationship.
     *
     * Results are grouped by user_is and it selects the sum of all points
     *
     * @return Relation
     */
    public function points()
    {
        return $this->hasMany('App\Models\Point')
            ->selectRaw('user_id, sum(points) as sum')
            ->groupBy('user_id');
    }
}