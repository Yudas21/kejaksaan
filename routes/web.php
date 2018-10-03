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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect(url(''));
});

Route::get('/', [ 'as' => 'login', 'uses' => 'LoginController@index']);
Route::post('login/login_check', 'LoginController@checkLogin');
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

Route::get('admin/menu', 'AdminController@menu');
Route::get('admin/data_menu', 'AdminController@data_menu');
Route::get('admin/data_menu_parent', 'AdminController@menu_parent');
Route::get('admin/search_menu', 'AdminController@menu_search');
Route::post('admin/simpan_menu', 'AdminController@menu_store');
Route::put('admin/update_menu/{menu}', 'AdminController@menu_update');
Route::delete('admin/destroy_menu/{menu}', 'AdminController@menu_destroy');

Route::get('admin/level', 'AdminController@level');
Route::get('admin/data_level', 'AdminController@data_level');
Route::get('admin/search_level', 'AdminController@level_search');
Route::post('admin/simpan_level', 'AdminController@level_store');
Route::put('admin/update_level/{level}', 'AdminController@level_update');
Route::get('admin/access_level/{level}', 'AdminController@level_access');
Route::post('admin/update_access_level/{level}', 'AdminController@level_access_update');
Route::delete('admin/level_menu/{level}', 'AdminController@level_destroy');