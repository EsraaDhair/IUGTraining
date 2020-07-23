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
Route::get('/','HomeController@home')->name('home');
Route::get('/Training/manual',function (){
    return view('website.Training_manual');
})->name('Training.manual');
=======
Route::get('/', 'websitecontrollers\homeController@index');
>>>>>>> 6d84b380018b4a84999b99e91edf2194b6a87b9d

Route::group(['prefix' => 'controlpanel'], function () {
    Route::get('/students','controlpanelcontrollers\StudentController@index')->name('students.index');
    Route::get('/enterprises','controlpanelcontrollers\EnterpriseController@index')->name('enterprises.index');
    Route::get('/general/training','controlpanelcontrollers\TrainingController@getGeneralTrainingStudents')->name('training.general');
    Route::get('/specialTraining/approved','controlpanelcontrollers\TrainingController@getSpecialTrainingStudents')->name('special.getSpecialTrainingStudents');
    Route::post('/specialTraining','controlpanelcontrollers\TrainingController@getApproved')->name('special.getApproved');
    Route::get('/distribute/students','controlpanelcontrollers\TrainingController@distributeStudents')->name('distribute.students');
<<<<<<< HEAD



=======
    Route::get('/passwords/students','controlpanelcontrollers\StudentController@setPasswords')->name('passwords.students');
    Route::get('/passwords/enterprises','controlpanelcontrollers\EnterpriseController@setPasswords')->name('passwords.enterprises');
>>>>>>> 6d84b380018b4a84999b99e91edf2194b6a87b9d
    Route::get('/slider/create','controlpanelcontrollers\SliderController@create')->name('slider.create');
    Route::post('/slider','controlpanelcontrollers\SliderController@store')->name('slider.store');
    Route::get('/slider','controlpanelcontrollers\SliderController@index')->name('slider.index');

    Route::get('slider/destroy/{id}','controlpanelcontrollers\SliderController@destroy')->name('slider.destroy');
    Route::get('slider/edit/{id}', 'controlpanelcontrollers\SliderController@edit')->name('slider.edit');
    Route::put('slider/update/{id}', 'controlpanelcontrollers\SliderController@update')->name('slider.update');


//    Route::get('/specialTraining/approved','controlpanelcontrollers\TrainingController@getSpecialTrainingStudents')->name('special.getSpecialTrainingStudents');
//    Route::post('/specialTraining','controlpanelcontrollers\TrainingController@getApproved')->name('special.getApproved');

    Route::get('export/students/{city}', 'controlpanelcontrollers\ImportExportController@export')->name('export.students');
    Route::get('importView', 'controlpanelcontrollers\ImportExportController@importView');
    Route::post('import/students', 'controlpanelcontrollers\ImportExportController@import')->name('import.students');


});
Route::get('/student/create','websitecontrollers\stdRegistrationController@create')->name('std.create');
Route::post('/student','websitecontrollers\stdRegistrationController@store')->name('std.store');

Route::get('/enterprise/create','websitecontrollers\entRegisterController@create')->name('ent.create');
Route::post('/enterprise','websitecontrollers\entRegisterController@store')->name('ent.store');

