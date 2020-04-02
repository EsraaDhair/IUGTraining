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
    return view('website/home');
//    return view('layouts.controlLayout.Layout');
});
Route::get('/student/create','websitecontrollers\stdRegistrationController@create')->name('std.create');
Route::post('/student','websitecontrollers\stdRegistrationController@store')->name('std.store');

Route::get('/enterprise/create','websitecontrollers\entRegisterController@create')->name('ent.create');
Route::post('/enterprise','websitecontrollers\entRegisterController@store')->name('ent.store');

