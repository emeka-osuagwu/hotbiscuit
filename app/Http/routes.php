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

Route::get('/', [
	'uses' 	=> 'PagesController@getUpdateProfile',
	'as' 	=> '/',
]);

Route::get('/profile', [
	'uses' 	=> 'PagesController@getUpdateProfile',
	'as' 	=> '/',
]);

Route::post('/profile/update', [
	'uses' 	=> 'PagesController@postUpdateProfile',
	'as' 	=> '/',
]);

Route::get('logout', function () {
	Auth::logout();
	return redirect('login');
});


Route::get('/login', [
	'uses' 	=> 'PagesController@getLogin',
	'as' 	=> '/',
]);

Route::post('/login', [
	'uses' 	=> 'PagesController@postLogin',
	'as' 	=> '/',
]);

Route::get('/register', [
	'uses' 	=> 'PagesController@getRegister',
	'as' 	=> '/',
]);

Route::post('/register', [
	'uses' 	=> 'PagesController@postRegister',
	'as' 	=> '/',
]);



// Route::get('/auth/{provider}', 'OauthController@getSocialLogin');