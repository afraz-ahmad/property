<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('master');
});

Route::get('/home', function () {
    return view('master');
});

Route::get('/index', 'recordController@index');
Route::get('/enter_new_data', 'recordController@enter_new_data')->name('enter_new_data');
Route::post('/save_to_db', 'recordController@save_to_db')->name('save');
Route::get('/phase/{phase}', 'recordController@phase');
Route::get('/delete', 'recordController@deleteData');
Route::get('/delete/{id}', 'recordController@destroy')->name('delete_this_record');
Route::get('/add/', 'recordController@add_single_record')->name('enter_single_data');
Route::post('/addsinglerecord', 'recordController@save_single_record')->name('save_single_data');
Route::post('/search', 'recordController@search')->name('search');

Route::get('/delete', 'recordController@delete_15_days_data')->name('delete15.data');
Route::post('/delete/given/time', 'recordController@deleteGivenTimeData')->name('given.time.delete.data');
