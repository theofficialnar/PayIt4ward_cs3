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

Route::get('/home', 'HomeController@homePage')->middleware('auth');

//Route to admin panel
Route::get('/admin_panel', 'UserController@adminPanel');

//Route to add new user
Route::post('/admin_panel/add_user', 'UserController@addUser');

//Ajax route to viewing user data via modal
Route::post('/admin_panel/user/{id}', 'UserController@adminViewUser');

//Ajax route to update user data
Route::post('/admin_panel/user/update/{id}', 'UserController@adminUpdateUser');

// Ajax route to update user acct data
Route::post('/admin_panel/user/updateacct/{id}', 'UserController@adminUpdateUserAcct');

//Ajax rout to pull up a dynamic payroll modal
Route::post('/admin_panel/user/payroll/{id}', 'UserController@getPayrollForm');

//Test Ajax
Route::post('/admin/contribCheck', 'PaymentsController@contribCheck');

//test route
Route::post('/admin_panel/payroll_update', 'PaymentsController@payrollUpdate');