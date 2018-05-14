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

Auth::routes();

// Route::get('/dash', 'DashboardController@index')->middleware('UserRole');
// Route::post('/dashstore', 'DashboardController@store');

Route::resource('/dash','DashboardController')->middleware('UserRole');


Route::resource('/DepartmentHead','DepartmentHeadController');


Route::get('/unauthorised', function () {
    return view('unauthorised');
});

Route::get('/home', 'HomeController@index')->name('home');
