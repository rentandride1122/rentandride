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
Route::get('/admin/viewprivatecar','CarController@viewprivatecar')->name('viewprivatecar');
Route::get('/admin/viewprivatecar/{car}','CarController@viewprivatecarById')->name('viewprivatecarsingle');

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


Route::put('/user/updateuser','UserController@updateuser');
Route::delete('/user/deleteuser','UserController@deleteuser');
Route::get('/user/update','UserController@update')->middleware('auth');
Route::get('/user/logout','UserController@logout')->name('user.logout');

Route::get('/user/viewcars','UserCarController@viewcar')->name('user.viewcar');
Route::get('/user/yourcar','UserCarController@viewyourcar')->name('user.viewyourcar');
Route::get('/user/yourcar/view/{id}','UserCarController@yourcardesc')->name('user.yourcardesc');
Route::get('/user/update/yourcar/{id}','UserCarController@updateyourcar')->name('user.updateyourcar');
Route::delete('/user/delete/yourcar','UserCarController@deleteyourcar')->name('user.deleteyourcar');

//testing privatecar

Route::get('/user/createcar','UserCarController@insert')->name('user.insert.car')->middleware('auth');
Route::post('/user/createcar','UserCarController@store')->name('user.store.car')->middleware('auth');


Route::get('/client/bookcar/{id}','BookingController@insert')->middleware('auth');
Route::post('/client/bookcar','BookingController@store')->middleware('auth');
Route::get('/user/booking/detail','BookingController@view')->middleware('auth');



Auth::routes();

