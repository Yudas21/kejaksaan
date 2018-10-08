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
Route::get('users', 'UserController@index');
Route::get('users/tambah', 'UserController@users_add');
Route::post('users/simpan', 'UserController@users_store');
Route::get('users/ubah/{users}', 'UserController@users_edit');
Route::patch('users/update/{users}', 'UserController@users_update');
Route::get('users/ubah_password/{users}', 'UserController@users_edit_password');
Route::patch('users/update_password/{users}', 'UserController@users_update_password');
Route::delete('users/hapus/{users}', 'UserController@users_delete');

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

Route::get('jabatan', 'JabatanController@index');
Route::get('jabatan/tambah', 'JabatanController@jabatan_add');
Route::post('jabatan/simpan', 'JabatanController@jabatan_store');
Route::get('jabatan/ubah/{jabatan}', 'JabatanController@jabatan_edit');
Route::patch('jabatan/update/{jabatan}', 'JabatanController@jabatan_update');
Route::delete('jabatan/hapus/{jabatan}', 'JabatanController@jabatan_destroy');

Route::get('bagian', 'BagianController@index');
Route::get('bagian/tambah', 'BagianController@bagian_add');
Route::post('bagian/simpan', 'BagianController@bagian_store');
Route::get('bagian/ubah/{bagian}', 'BagianController@bagian_edit');
Route::patch('bagian/update/{bagian}', 'BagianController@bagian_update');
Route::delete('bagian/hapus/{bagian}', 'BagianController@bagian_destroy');

