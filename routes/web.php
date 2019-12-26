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


#groups
Route::get('/groups/downloadgroups', 'GroupController@downloadgroups');
Route::get('/groups/getUsers/{id}', 'GroupController@getUsers');
Route::get('/groups/{id}/deactivate', 'GroupController@deactivate')->name('groups-deactivate');
Route::get('/groups/manage', 'GroupController@manage')->name('groups-manage');
Route::get('/groups/getGroups', 'GroupController@getGroups');
Route::resource('groups', 'GroupController');

#users
Route::get('/users/getAllUsers', 'UserController@getAllUsers');
Route::get('/users/downloadusers', 'UserController@downloadusers');
Route::get('/users/{id}/deactivate', 'UserController@deactivate')->name('users-deactivate');
Route::resource('users', 'UserController');

#personal
Route::get('personal/{id}/edit', 'PersonalController@personalEdit')->name('edit-personal');
Route::put('personal/{id}','PersonalController@updatePersonal')->name('update-personal');

Route::get('change-password', 'ChangePasswordController@index')->name('change-password');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');