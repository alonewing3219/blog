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
Route::post('/login','Auth\AuthController@login');

Route::group([ 'middleware' => ['admin.check']], function(){
Route::get('/register', 'RegisterController@showRegistrationForm');
Route::post('/register', 'RegisterController@register');
	Route::get('/logout', 'Auth\AuthController@logout');
	Route::get('/dashboard', 'Admin\AdminController@dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'StoreController@getStoreList');
Route::get('/manager', 'ManagerController@getManager');
Route::post('/manager', 'ManagerController@getStore');
});

//Auth::routes();
//Route::get('/', 'Auth\AuthController@showLoginForm');
//Route::get('/login', 'CheckLoginController@show');
//Route::post('/login', 'CheckLoginController@login');
//Route::get('/logout', 'CheckLoginController@logout');
//Route::get('/home', 'HomeController@index');

//Auth::routes();


Auth::routes();


Route::post('/getFoodList', 'HomeController@getFoodList');
