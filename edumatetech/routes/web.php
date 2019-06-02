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








Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sample/index', 'SampleController@index')->name('sample.index');
Route::get('/sample/create', 'SampleController@create')->name('sample.create');
Route::post('/sample/store', 'SampleController@store')->name('sample.store');
Route::get('/sample/list', 'SampleController@list')->name('sample.list');
Route::post('/sample/destroy', 'SampleController@destroy')->name('sample.destroy');
Route::get('sample/{id}', 'SampleController@edit')->name('sample.edit');
Route::patch('sample/{id}', 'SampleController@update')->name('sample.update');
//---Role---------------
Route::get('/role/index', 'RoleController@index')->name('role.index');
Route::get('/role/create', 'RoleController@create')->name('role.create');
Route::post('/role/store', 'RoleController@store')->name('role.store');
Route::get('/role/list', 'RoleController@list')->name('role.list');
Route::post('/role/destroy', 'RoleController@destroy')->name('role.destroy');
Route::get('role/{id}', 'RoleController@edit')->name('role.edit');
Route::patch('role/{id}', 'RoleController@update')->name('role.update');

//---User---------------
Route::get('/user/index', 'UsersController@index')->name('user.index');
Route::get('/user/create', 'UsersController@create')->name('user.create');
Route::post('/user/store', 'UsersController@store')->name('user.store');
Route::get('/user/list', 'UsersController@list')->name('user.list');
Route::post('/user/destroy', 'UsersController@destroy')->name('user.destroy');
Route::get('user/{id}', 'UsersController@edit')->name('user.edit');
Route::patch('user/{id}', 'UsersController@update')->name('user.update');
