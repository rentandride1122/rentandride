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
Route::get('/', 'HomeController@index')->name('user');
Route::get('/admin/index', 'UserController@index')->name('admin');
Route::get('/admin/createcar','CarController@insert');
Route::post('/admin/createcar','CarController@store');



Route::get('/user/index', 'UserController@user_index')->name('user');
Route::get('/user/login','UserController@login')->name('user.login');
Route::get('/user/register','UserController@register')->name('user.register');

Route::get('/admin/updatecar/{car}','CarController@editcar');
Route::put('/admin/updatecar','CarController@updatecar');
Route::delete('/admin/deletecar/{car}','CarController@deletecar');
Route::get('/admin/viewcar','CarController@viewcar')->name('viewcar');

Route::delete('/admin/deletecar','CarController@deletecar');


Route::get('/user/index', 'UserController@user_index')->name('user');
Route::get('/user/login','UserController@login')->name('user.login');
Route::get('/user/register','UserController@register')->name('user.register');

Route::patch('/admin/updatecar/{car}','CarController@updatecar');
Route::post('/admin/updatecar','CarController@updatecar');
Route::delete('/admin/deletecar/{car}','CarController@deletecar');
Route::get('/admin/viewcar','CarController@viewcar')->name('viewcar');
//test change password
Route::put('/changepassword/{user}','UserController@changepassword');

Route::put('/user/updateuser/{user}','UserController@updateuser');
Route::delete('/user/deleteuser/{user}','UserController@deleteuser');


Auth::routes();

