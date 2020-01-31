<?php

use Illuminate\Http\Request;
Use App\Movies;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
// Route::get('movies', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Movies::all();
// });
 
// Route::get('movies/{id}', function($id) {
//     return Movies::find($id);
// });

//Movie Routes
Route::get('movies', 'MovieController@index');
Route::get('movies/{movie}', 'MovieController@show');
Route::get('search','MovieController@searchByName');
Route::post('movies', 'MovieController@store');
Route::put('movies/{id}', 'MovieController@update');
Route::delete('movies/{id}', 'MovieController@delete');

//Users Routes
Route::post('user-sign-up', 'UserController@store');
Route::get('verify','UserController@verifyEmail');
Route::get('favorites','UserController@favorites');



