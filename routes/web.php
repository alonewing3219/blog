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

//Route::get('/', function () {
//	return view('welcome');
//});
//Route::get('/getStoreList', 'StoreController@getStoreList');
Route::get('/', 'Auth\AuthController@showLoginForm');
Route::get('/login','Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/google', 'Auth\AuthController@redirectToGoogle');

Route::get('/google/callback', 'Auth\AuthController@GoogleCallback');
Route::group([ 'middleware' => ['admin.check']], function(){
		Route::post('/logout', 'Auth\AuthController@logout');
		Route::get('/dashboard', 'Admin\AdminController@dashboard');
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/user', 'UserController@getStoreList');
		Route::get('/manager', 'ManagerController@getManager');
		Route::post('/manager', 'ManagerController@getStore');
		Route::post('/user', 'UserController@getUserOrder');
		Route::get('/record', 'ManagerController@getRecord');
	 	Route::get('/orderlist', 'OrderController@getOrderList');
Route::post('/orderlist', 'OrderController@getOrder');
});

//Auth::routes();

//Route::get('/', 'Auth\AuthController@showLoginForm');
//Route::get('/login', 'CheckLoginController@show');
//Route::post('/login', 'CheckLoginController@login');
//Route::get('/logout', 'CheckLoginController@logout');
//Route::get('/home', 'HomeController@index');



Route::post('/getFoodList', 'HomeController@getFoodList');
