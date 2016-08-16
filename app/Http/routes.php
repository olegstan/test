<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/register', 'AuthController@create');
Route::post('/register/store',['as' => 'user_store', 'uses' => 'UserController@store']);

Route::get('/', function (){
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', 'UserController');
});



