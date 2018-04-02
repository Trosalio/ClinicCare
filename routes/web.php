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
})->name('welcomePage');

Route::auth();

Route::get('/home', 'DashboardController@index');

// Routes for admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');
});


// Routes for client
Route::prefix('client')->group(function () {
    Route::get('/dashboard', 'DashboardController@clientDashboard')->name('client.dashboard');
});


// Routes for doctor
Route::prefix('doctor')->group(function () {
    Route::get('/dashboard', 'DashboardController@doctorDashboard')->name('doctor.dashboard');
});
