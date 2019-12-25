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

Auth::routes(['register' => false]);

#homepage
Route::get('/home', 'HomeController@index')->name('home');

#adminpage
Route::get('/admin', 'AdminPageController@index')->name('admin');


#users
Route::get('/users/downloadusers', 'UserController@downloadusers');
Route::resource('users', 'UserController');

#personal
Route::get('personal/{id}/edit', 'PersonalController@personalEdit')->name('edit-personal');
Route::put('personal/{id}','PersonalController@updatePersonal')->name('update-personal');

Route::get('change-password', 'ChangePasswordController@index')->name('change-password');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');