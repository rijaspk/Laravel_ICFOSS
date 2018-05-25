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
    return view('/auth/login');
});
// Route::get('/MyProfile', function () {
//     return view('MyProfile');
// });

Auth::routes();

Route::resource('/dash','DashboardController');

Route::post('/saveprofiledata','ProfileController@saveprofiledata');
Route::post('/Updaterow','DepartmentHeadController@Updaterow');
Route::resource('/DepartmentHead','DepartmentHeadController');

Route::resource('/MyProfile','ProfileController');


Route::get('/unauthorised', function () {
    return view('unauthorised');
});
Route::get('/userRole', 'userRoleContoller@overview');
Route::get('/home', 'HomeController@index')->name('home');
