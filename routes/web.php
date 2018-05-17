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
// Route::get('/MyProfile', function () {
//     return view('MyProfile');
// });

Auth::routes();

Route::resource('/dash','DashboardController')->middleware('UserRole');


Route::resource('/DepartmentHead','DepartmentHeadController');

Route::resource('/MyProfile','ProfileController');


Route::get('/unauthorised', function () {
    return view('unauthorised');
});

Route::get('/home', 'HomeController@index')->name('home');
