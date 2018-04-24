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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Routes for client & doctor
Route::group(['middleware' => ['auth', 'check_role:client,doctor']], function () {
    Route::group(['prefix' => 'client'], function () {
        Route::get('dashboard', 'ClientController@index')->name('client.dashboard');
    });
    Route::get('profile', 'ClientController@profile')->name('profile');
});

// Routes exclusively for doctor
Route::group(
    ['middleware' => ['auth', 'check_role:doctor'], 'prefix' => 'doctor'],
    function () {
        Route::get('dashboard', 'DoctorController@index')
            ->name('doctor.dashboard');
    }
);

// Routes exclusively for admin
Route::group(
    ['middleware' => ['auth', 'check_role:admin'], 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'UserController@index')->name('admin.dashboard');
        Route::get('show/{user}', 'UserController@show')->name('users.show');
        Route::put('show/{user}', 'UserController@update')->name('users.update');
        Route::delete('show/{user}', 'UserController@destroy')->name('users.destroy');
    }
);