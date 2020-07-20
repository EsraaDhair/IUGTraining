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

Route::group(['prefix' => 'controlpanel'], function () {
    Route::get('/students','controlpanelcontrollers\StudentController@index')->name('students.index');
    Route::get('/enterprises','controlpanelcontrollers\EnterpriseController@index')->name('enterprises.index');
    Route::get('/general/training','controlpanelcontrollers\TrainingController@getGeneralTrainingStudents')->name('training.general');
    Route::get('/specialTraining/approved','controlpanelcontrollers\TrainingController@getSpecialTrainingStudents')->name('special.getSpecialTrainingStudents');
    Route::post('/specialTraining','controlpanelcontrollers\TrainingController@getApproved')->name('special.getApproved');
    Route::get('/distribute/students','controlpanelcontrollers\TrainingController@distributeStudents')->name('distribute.students');
    Route::get('/passwords/students','controlpanelcontrollers\StudentController@setPasswords')->name('passwords.students');
    Route::get('/passwords/enterprises','controlpanelcontrollers\EnterpriseController@setPasswords')->name('passwords.enterprises');
    Route::get('/slider/create','controlpanelcontrollers\SliderController@create')->name('slider.create');
    Route::post('/slider','controlpanelcontrollers\SliderController@store')->name('slider.store');

});

Route::get('/student/create','websitecontrollers\stdRegistrationController@create')->name('std.create');
Route::post('/student','websitecontrollers\stdRegistrationController@store')->name('std.store');

Route::get('/enterprise/create','websitecontrollers\entRegisterController@create')->name('ent.create');
Route::post('/enterprise','websitecontrollers\entRegisterController@store')->name('ent.store');

