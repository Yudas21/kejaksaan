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
    return redirect(url(''));
});

Route::get('/', [ 'as' => 'login', 'uses' => 'LoginController@index']);
Route::post('login/check_login', 'LoginController@checkLogin');
Route::get('login/forgotpassword', 'LoginController@forgotPassword');
Route::post('login/pforgotpassword', 'LoginController@pForgotPassword');
Route::get('admin/dashboard', 'AdminController@index');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/profile', 'AdminController@profile');
Route::patch('admin/update_profile/{profile}', 'AdminController@profile_update');
Route::patch('admin/update_password/{profile}', 'AdminController@password_update');
Route::patch('admin/change_photo', 'AdminController@change_photo');

// CRUD Users
Route::get('admin/users', 'AdminController@users');
Route::get('admin/data_users', 'AdminController@data_users');
Route::get('admin/search_users', 'AdminController@users_search');
Route::get('admin/add_users', 'AdminController@users_add');
Route::post('admin/store_users', 'AdminController@users_store');
Route::put('admin/update_users/{users}', 'AdminController@users_update');
Route::put('admin/update_password_users/{users}', 'AdminController@users_update_password');
Route::delete('admin/delete_users/{users}', 'AdminController@users_delete');
Route::get('admin/exporttoexcel_users', 'AdminController@exportToExcelUsers');

// CRUD Menu
Route::get('menu', 'MenuController@index');
Route::get('menu/tambah', 'MenuController@menu_add');
Route::post('menu/simpan', 'MenuController@menu_store');
Route::get('menu/ubah/{menu}', 'MenuController@menu_edit');
Route::patch('menu/update/{menu}', 'MenuController@menu_update');
Route::delete('menu/hapus/{menu}', 'MenuController@menu_destroy');

// CRUD Level
Route::get('level', 'LevelController@index');
Route::get('level/tambah', 'LevelController@level_add');
Route::post('level/simpan', 'LevelController@level_store');
Route::get('level/ubah/{level}', 'LevelController@level_edit');
Route::patch('level/update/{level}', 'LevelController@level_update');
Route::delete('level/hapus/{level}', 'LevelController@level_destroy');
Route::get('level/access_level/{level}', 'LevelController@level_access');
Route::post('level/update_access_level/{level}', 'LevelController@level_access_update');

