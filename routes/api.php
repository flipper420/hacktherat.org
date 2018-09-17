<?php

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Category;
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
	$names = DB::table('users')->limit(200)->pluck('points', 'username');
	$data['username'] = $names->keys();
	$data['points'] = $names->values();
	return response()->json($data);
});

Route::get('/gender', function () {
	$male = Profile::whereGender('male')->count();
	$female = Profile::whereGender('female')->count();
	$unknown = Profile::whereGender('unspecified')->count();
	$dataset = ['Male' => $male, 'Female' => $female, 'Unspecified' => $unknown];
	return response()->json($dataset);
});

Route::get('/missions', function() {
	$categories = Category::withCount('Missions')->whereType('Mission')->pluck('missions_count', 'name')->all();
	[$keys, $values] = array_divide($categories);
	return response()->json(['categories'=>$keys, 'count'=>$values]);
});