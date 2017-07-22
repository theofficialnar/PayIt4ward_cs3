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

Route::get('/home', 'HomeController@homePage');

//Route to admin panel
Route::get('/admin_panel', 'UserController@adminPanel');

//Route to add new user
Route::post('/admin_panel/add_user', 'UserController@addUser');

//Ajax route to viewing user data via modal
Route::post('/admin_panel/user/{id}', 'UserController@adminViewUser');

//Ajax route to update user data
Route::post('/admin/user/update/{id}', 'UserController@adminUpdateUser');
