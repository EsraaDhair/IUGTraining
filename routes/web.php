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


<<<<<<< HEAD



Route::get('/', 'websitecontrollers\homeController@index')->name('home');


=======
Route::get('/','websitecontrollers\HomeController@home')->name('home');
>>>>>>> 4b6fe999423da59bd616ed58ba61aa9df1626da6
Route::get('/Training/manual',function (){
    return view('website.Training_manual');
})->name('Training.manual');
Route::get('/Training/committee',function (){
    return view('website.Training_committee');
})->name('Training.committee');
Route::get('/Contact/Us',function (){
    return view('website.contactus');
})->name('contact.us');


Route::group(['prefix' => 'controlpanel' ,'middleware'=>'auth'], function () {
    Route::get('/students','controlpanelcontrollers\StudentController@index')->name('students.index');
    Route::get('/enterprises','controlpanelcontrollers\EnterpriseController@index')->name('enterprises.index');
    Route::get('/general/training','controlpanelcontrollers\TrainingController@getGeneralTrainingStudents')->name('training.general');
    Route::get('/specialTraining/approved','controlpanelcontrollers\TrainingController@getSpecialTrainingStudents')->name('special.getSpecialTrainingStudents');
    Route::post('/specialTraining','controlpanelcontrollers\TrainingController@getApproved')->name('special.getApproved');
    Route::get('/distribute/students','controlpanelcontrollers\TrainingController@distributeStudents')->name('distribute.students');

    Route::get('/passwords/students/{type}','controlpanelcontrollers\TrainingController@setPasswords')->name('passwords.students');
    Route::get('/passwords/enterprises','controlpanelcontrollers\EnterpriseController@setPasswords')->name('passwords.enterprises');

    Route::get('/slider/create','controlpanelcontrollers\SliderController@create')->name('slider.create');
    Route::post('/slider','controlpanelcontrollers\SliderController@store')->name('slider.store');
    Route::get('/slider','controlpanelcontrollers\SliderController@index')->name('slider.index');

    Route::get('slider/destroy/{id}','controlpanelcontrollers\SliderController@destroy')->name('slider.destroy');
    Route::get('slider/edit/{id}', 'controlpanelcontrollers\SliderController@edit')->name('slider.edit');
    Route::put('slider/update/{id}', 'controlpanelcontrollers\SliderController@update')->name('slider.update');

    Route::get('export/students/{city}', 'controlpanelcontrollers\ImportExportController@export')->name('export.students');
    Route::get('importView', 'controlpanelcontrollers\ImportExportController@importView');
    Route::post('import/students', 'controlpanelcontrollers\ImportExportController@import')->name('import.students');


});
Route::get('/student/create','websitecontrollers\stdRegistrationController@create')->name('std.create');
Route::post('/student','websitecontrollers\stdRegistrationController@store')->name('std.store');

Route::get('/enterprise/create','websitecontrollers\entRegisterController@create')->name('ent.create');
Route::post('/enterprise','websitecontrollers\entRegisterController@store')->name('ent.store');

Route::get('/student/general','websitecontrollers\studentController@viewForGeneral');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
