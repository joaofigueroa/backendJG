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



//Movie Routes
Route::get('movies', 'MovieController@index');
Route::get('movies/{movie}', 'MovieController@show');
Route::get('search','MovieController@searchByName');
Route::post('movies', 'MovieController@store');
Route::put('movies/{id}', 'MovieController@update');
Route::delete('movies/{id}', 'MovieController@delete');

//Users Routes
Route::get('verify','UserController@verifyEmail');
Route::get('favorites','UserController@favorites');
Route::post('addFavorite', 'UserController@newFavorite');
Route::post('removeFavorite', 'UserController@unFavorite');
Route::post('user-sign-up', 'UserController@store');
Route::put('alterUser/{id}', 'UserController@update');
Route::delete('deleteUser/{id}', 'UserController@destroy');



