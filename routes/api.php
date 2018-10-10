<?php

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Category;
use App\Models\User;
use App\Http\Resources\User as UserResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/missions/password/category/{cat}', function ($cat) {
	$names = DB::table('missions')->where('category_id', (int)$cat)->get();
	return response()->json($names);
});

Route::get('/users', function () {
    return UserResource::collection(User::paginate());
});

Route::get('/userranks', function () {
    // $ranks = \App\Models\UserRank::all()->groupBy('rank_id');
    $ranks = DB::select(DB::raw('select COUNT(*) as total, rank_id from rank_user GROUP BY rank_id'));
    return response()->json($ranks);
});


// Route::get('/users', function () {
// 	$names = DB::table('users')->limit(200)->pluck('points', 'username');
// 	$data['username'] = $names->keys();
// 	$data['points'] = $names->values();
// 	return response()->json($data);
// });

Route::get('/gender', function () {
	$male    = Profile::whereGender('male')->count();
	$female  = Profile::whereGender('female')->count();
	$unknown = Profile::whereGender('unspecified')->count();
	$dataset = ['Male' => $male, 'Female' => $female, 'Unspecified' => $unknown];
	return response()->json($dataset);
});

Route::get('/missions', function() {
	$categories = Category::withCount('Missions')->whereType('Mission')->pluck('missions_count', 'name')->all();
	[$keys, $values] = array_divide($categories);
	return response()->json(['categories'=>$keys, 'count'=>$values]);
});

Route::get('/new-users-count', function() {
	$count = DB::select(DB::raw('SELECT COUNT(*) as total, YEAR(created_at) as year FROM `users` GROUP BY YEAR(created_at)'));
	return response()->json($count);
});

Route::get('/completed-missions', function() {
	$count = DB::select(DB::raw('SELECT COUNT(*) as total, category_id FROM `completed_missions` GROUP BY category_id'));
	$count = DB::select(DB::raw('SELECT COUNT(*) as total, rank_id FROM `rank_user` GROUP BY rank_id'));
	return response()->json($count);
});

Route::get('/rankings', function() {
	$count = DB::select(DB::raw('SELECT COUNT(*) as total, rank_id FROM `rank_user` GROUP BY rank_id'));
	return response()->json($count);
});