<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Replace prefix with app 'cause of docker app

Route::group(['prefix' => 'app'], function () {

    Auth::routes();

});

Route::get('home', 'HomeController@index')->name('home');
Route::get('home1', 'HomeController@index1')->name('home1');
Route::get('list', 'HomeController@list')->name('list');
Route::get('profile', 'HomeController@profile')->name('profile');
