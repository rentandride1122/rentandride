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
Route::get('/admin/index', 'UserController@index')->name('admin')->middleware('admin');
Route::get('/admin/createcar','CarController@insert')->middleware('admin');
Route::post('/admin/createcar','CarController@store')->middleware('admin');



Route::get('/user/index', 'UserController@user_index')->name('user');
Route::get('/user/login','UserController@login')->name('user.login');
Route::get('/user/register','UserController@register')->name('user.register');

Route::get('/admin/updatecar/{car}','CarController@editcar');
Route::put('/admin/updatecar','CarController@updatecar');

Route::get('/admin/viewcar','CarController@viewcar')->name('viewcar');
Route::get('/admin/viewprivatecar','CarController@viewprivatecar')->name('viewprivatecar');
Route::get('/admin/viewprivatecar/{car}','CarController@viewprivatecarById')->name('viewprivatecarsingle');

Route::delete('/admin/deletecar','CarController@deletecar');


Route::get('/user/index', 'UserController@user_index')->name('user');
Route::get('/user/login','UserController@login')->name('user.login');
Route::get('/user/register','UserController@register')->name('user.register');

Route::patch('/admin/updatecar/{car}','CarController@updatecar');
Route::post('/admin/updatecar','CarController@updatecar');

Route::get('/admin/viewcar','CarController@viewcar')->name('viewcar');
//test change password
Route::put('/changepassword/{user}','UserController@changepassword');


Route::put('/user/updateuser','UserController@updateuser');
Route::delete('/user/deleteuser','UserController@deleteuser');
Route::get('/user/update','UserController@update')->middleware('auth');
Route::get('/user/logout','UserController@logout')->name('user.logout');

Route::get('/user/viewcars','UserCarController@viewcar')->name('user.viewcar');
Route::get('/user/yourcar','UserCarController@viewyourcar')->name('user.viewyourcar')->middleware('auth');
Route::get('/user/yourcar/view/{id}','UserCarController@yourcardesc')->name('user.yourcardesc')->middleware('auth');
Route::get('/user/update/yourcar/{id}','UserCarController@updateyourcar')->name('user.updateyourcar')->middleware('auth');
Route::delete('/user/delete/yourcar','UserCarController@deleteyourcar')->name('user.deleteyourcar')->middleware('auth');

//testing privatecar

Route::get('/user/createcar','UserCarController@insert')->name('user.insert.car')->middleware('auth');
Route::post('/user/createcar','UserCarController@store')->name('user.store.car')->middleware('auth');


Route::get('/client/bookcar/{id}','BookingController@insert')->middleware('auth');
Route::get('/client/bookprivatecar/{id}','BookingController@insertprivate')->middleware('auth');
Route::post('/client/bookcar','BookingController@store')->middleware('auth');
Route::get('/user/booking/detail','BookingController@view')->middleware('auth');

Route::post('/user/comment','ForumController@comment');
Route::get('/user/forum','ForumController@forum');
Route::delete('/user/deletemessage','ForumController@deletemessage');
Route::put('/user/updatemessage','ForumController@updatemessage')->name('user.updateforummessage');
Route::get('/user/updatemessage/{id}','ForumController@editmessage');

Route::get('/admin/booking/detail','BookingController@view_bookings')->middleware('admin');
Route::get('/admin/view/users','UserController@view_users')->middleware('admin');

Route::get('/user/viewprivatecars','PrivateCarController@viewcar')->name('user.viewprivatecar');

Route::get('/user/update/booking/{id}','BookingController@update_user_booking');
Route::put('/user/edit/booking','BookingController@edit_user_booking');
Route::put('/user/cancel/booking/','BookingController@user_cancel_booking');
Route::put('/admin/cancel/booking/','BookingController@cancel_booking')->middleware('admin');

Route::put('/admin/confirm/booking/','BookingController@confirm_booking')->middleware('admin');

Route::put('/admin/confirm/privatecar/','BookingController@confirm_privatecar')->middleware('admin');
Route::delete('/admin/delete/privatecar/','BookingController@delete_privatecar')->middleware('admin');

Route::put('/user/edit/yourcar/','UserCarController@edityourcar')->name('user.edityourcar');

Route::get('/user/car/fulldescription/{id}','UserCarController@fullcar')->name('user.fullcar');
Route::get('/user/privatecar/fulldescription/{id}','UserCarController@fullprivatecar')->name('user.fullprivatecar');

Route::get('/date','UserCarController@date');

Route::get('/admin/forum','ForumController@admin_forum')->middleware('admin');
Route::get('/admin/notification','NotificationController@notification')->middleware('admin');
Route::put('/admin/complete/booking/','BookingController@complete_booking')->middleware('admin');
Route::get('/admin/notification/markAsRead','NotificationController@markAsRead')->middleware('admin');
Route::get('/user/notification/markAsRead','NotificationController@user_markAsRead')->middleware('auth');


Auth::routes();

