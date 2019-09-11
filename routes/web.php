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
Route::get('/admin/createcar','CarController@insert');
Route::post('/admin/createcar','CarController@store');

Route::patch('/admin/updatecar/{car}','CarController@updatecar');
Route::delete('/admin/deletecar/{car}','CarController@deletecar');
Route::get('/admin/viewcar','CarController@viewcar')->name('viewcar');







Auth::routes();

