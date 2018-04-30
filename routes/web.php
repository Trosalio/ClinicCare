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
})->name('homepage');

Route::auth();

// Routes for client & doctor
Route::group(['middleware' => ['auth', 'check_role:client,doctor']], function () {
    Route::get('dashboard', 'ClientController@index')->name('dashboard');
    Route::get('profile', 'ClientController@profile')->name('profile');
    Route::put('profile', 'ClientController@update')->name('profile.update');
    Route::get('profile/edit', 'ClientController@edit')->name('profile.edit');
});

// Routes exclusively for doctor
Route::group(
    ['middleware' => ['auth', 'check_role:doctor'], 'prefix' => 'doctor'],
    function () {
        Route::get('dashboard', 'DoctorController@index')
            ->name('doctor.dashboard');
        Route::get('diagnose/client/{client}', 'DoctorController@showDiagnosis')->name('doctor.diagnose');
        Route::get('diagnose/show', 'DoctorController@showDiagnosis')
            ->name('doctor.show');
        Route::get('patient', 'DoctorController@showAllPatient')
            ->name('doctor.showpatient');
        Route::post('diagnose/show', 'DoctorController@storeDiagnosis')
            ->name('doctor.storeDiagnosis');
        Route::get('diagnose/{appointment}/create', 'DoctorController@createDiagnosis')
            ->name('doctor.createDiagnosis');
        Route::get('diagnose/{diagnose}/edit', 'DoctorController@editDiagnosis')
            ->name('doctor.editDiagnosis');
    }
);

// Routes exclusively for admin
Route::group(
    ['middleware' => ['auth', 'check_role:admin'], 'prefix' => 'admin'],
    function () {
        Route::resource('users', 'UserController')->except(['index']);
        Route::get('dashboard', 'UserController@index')->name('users.index');
        Route::get('pdf', 'UserController@savePDF')->name('users.savePDF');
    }
);

// Routes schedule page
Route::get('/schedule', 'ScheduleController@index');
Route::post('/schedule', 'ScheduleController@addApp');

// Routs appointment page
Route::get('/appointment/{id}', 'AppointmentController@index');
Route::post('/appointment/{app}', 'AppointmentController@statusUpdate');
