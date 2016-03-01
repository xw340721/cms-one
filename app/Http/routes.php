<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
	Route::auth();
	Route::get('/home', 'HomeController@index');
	/**
	 * 后台控制器
	 */
});
Route::group(['middleware' => 'web'], function () {
	Route::get('admin/login', 'Admin\AuthController@getLogin');
	Route::get('admin/register', 'Admin\AuthController@getRegister');
	Route::post('admin/register', 'Admin\AuthController@postRegister');
	Route::get('admin/logout', 'Admin\AuthController@logout');
	Route::post('admin/login', 'Admin\AuthController@postLogin');
	Route::get('admin', 'AdminController@index');

	Route::group(['prefix' => 'admin'], function () {
		Route::get('myinfo', 'Admin\MyinfoController@index');
		Route::get('password', 'Admin\MyinfoController@password');
		Route::put('password', 'Admin\MyinfoController@change_password');
		Route::resource('company/brand', 'Admin\CompanyBrandController');
	});
});