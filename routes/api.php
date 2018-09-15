<?php

use Illuminate\Http\Request;

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
	$names = \App\Models\User::all()->pluck('points', 'username');
	$data['username'] = $names->keys();
	$data['points'] = $names->values();
	return response()->json($data);
});