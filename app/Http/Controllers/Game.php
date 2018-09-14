<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Game extends Controller
{
     /**
     * Add points to an user.
     *
     * @param User $user
     * @param int  $points
     * @param null $message
     *
     * @return bool
     */
    public static function addPoints(User $user, $points = 5, $message = null)
    {
        if (empty($message)) {
            $message = 'Unknown reason.';
        }
        // add points points to this user
        $point_entry = new Point([
            'points'      => $points,
            'description' => $message,
        ]);
        return is_null($user->points()->save($point_entry)) ? false : true;
    }
}
