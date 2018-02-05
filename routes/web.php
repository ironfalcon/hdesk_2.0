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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('tasks', 'TasksController');
Route::resource('news', 'InformationController');
Route::resource('claims', 'ClaimController');

Auth::routes();
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
Route::get('messages/create', 'MessageController@create')->name('messages.create');
Route::post('messages', 'MessageController@store')->name('messages.store');
Route::get('messages', 'MessageController@index')->name('messages.index');
Route::get('messages/{message}', 'MessageController@show')->name('messages.show');
Route::get('schedules', 'ScheduleController@index')->name('schedules.index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'SearchController@ajaxData'));

