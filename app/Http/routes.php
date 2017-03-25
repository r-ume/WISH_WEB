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

//Route::get('/', 'WelcomeController@index');

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

Route::post('/myprofile/upload', 'UsersController@upload');
Route::get('/myprofile/edit/{user}', 'UsersController@edit');
Route::get('/myprofile', 'UsersController@show');
Route::get('/residents', 'UsersController@index');

Route::get('/events/edit/{event}', 'EventsController@edit');
Route::patch('/events/{event}', 'EventsController@update');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events', 'EventsController@index');
Route::delete('/events/{event}', 'EventsController@destroy');

Route::get('/api/tweets', 'API\APITweetController@index');

Route::get('/semantic/login', 'SemanticController@semanticLogin');
Route::get('/', 'SemanticController@semantic');