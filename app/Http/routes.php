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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('/tweets', 'TweetsController@store');
Route::get('/tweets/create', 'TweetsController@create');
Route::get('/tweets', 'TweetsController@index');
Route::get('/tweets/{tweet}', 'TweetsController@show');

Route::get('/wishtimes/edit/{wishtimes}', 'WishtimesController@edit');
Route::patch('/wishtimes/{wishtimes}', 'WishtimesController@update');
Route::post('/wishtimes', 'WishtimesController@store');
Route::get('/wishtimes/create', 'WishtimesController@create');
Route::get('/wishtimes', 'WishtimesController@index');
Route::get('/wishtimes/{wishtimes}', 'WishtimesController@show');
Route::delete('/wishtimes/{wishtimes}', 'WishtimesController@destroy');

Route::get('/api/tweets', 'API\APITweetController@index');