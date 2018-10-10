<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::with('profile')->wherename($username)->firstOrFail();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ranks = \App\Models\UserRank::topRank($user->id);
        $keyed = $ranks->mapWithKeys(function ($item) {
            return [$item['user_id'] => $item['rank_id']];
        });

        $rank = \App\Models\Rank::find($keyed->values());
        if ($user->isAdmin()) {
            return view('pages.admin.home', compact('user', 'rank'));
        }

        return view('pages.user.home');
    }
}
