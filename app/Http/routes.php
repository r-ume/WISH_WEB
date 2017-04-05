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
Route::get('/wishtimes/yours', 'WishtimesController@usersIndex');
Route::get('/wishtimes/{wishtimes}', 'WishtimesController@show');
Route::delete('/wishtimes/{wishtimes}', 'WishtimesController@destroy');
Route::post('/wishtimes/approve/{wishtimes}', 'WishtimesController@_approveWishtimes');
Route::post('/wishtimes/disapprove/{wishtimes}', 'WishtimesController@_disapproveWishtimes');


Route::post('/myprofile/upload', 'UsersController@upload');
Route::get('/myprofile/edit/{user}', 'UsersController@edit');
Route::get('/myprofile', 'UsersController@myprofile');
Route::get('/residents', 'UsersController@index');
Route::get('/user/{user}', 'UsersController@show');

Route::get('/events/edit/{event}', 'EventsController@edit');
Route::patch('/events/{event}', 'EventsController@update');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events', 'EventsController@index');
Route::delete('/events/{event}', 'EventsController@destroy');
Route::post('/events/attend/{event}', 'EventsController@attend');

Route::get('/feeds/{feed}', 'FeedsController@show');
Route::get('/feeds', 'FeedsController@index');

Route::get('/api/tweets', 'API\APITweetController@index');

Route::get('/api/wishtimes', 'API\APIWishtimesController@index');

Route::get('/api/events', 'API\APIEventsController@index');

Route::get('/semantic/login', 'SemanticController@semanticLogin');
Route::get('/', 'SemanticController@semantic');

Route::get('/calendar', 'FullCalendarController@index');