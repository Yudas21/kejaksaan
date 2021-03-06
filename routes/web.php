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

// CRUD Jenis Surat
Route::get('jenis_surat', 'JenisSuratController@index');
Route::get('jenis_surat/tambah', 'JenisSuratController@jenis_surat_add');
Route::post('jenis_surat/simpan', 'JenisSuratController@jenis_surat_store');
Route::get('jenis_surat/ubah/{jenis_surat}', 'JenisSuratController@jenis_surat_edit');
Route::patch('jenis_surat/update/{jenis_surat}', 'JenisSuratController@jenis_surat_update');
Route::delete('jenis_surat/hapus/{jenis_surat}', 'JenisSuratController@jenis_surat_destroy');

// CRUD Sifat Surat
Route::get('sifat_surat', 'SifatSuratController@index');
Route::get('sifat_surat/tambah', 'SifatSuratController@sifat_surat_add');
Route::post('sifat_surat/simpan', 'SifatSuratController@sifat_surat_store');
Route::get('sifat_surat/ubah/{sifat_surat}', 'SifatSuratController@sifat_surat_edit');
Route::patch('sifat_surat/update/{sifat_surat}', 'SifatSuratController@sifat_surat_update');
Route::delete('sifat_surat/hapus/{sifat_surat}', 'SifatSuratController@sifat_surat_destroy');

// CRUD Klasifikasi Surat
Route::get('klasifikasi_surat', 'KlasifikasiSuratController@index');
Route::get('klasifikasi_surat/tambah', 'KlasifikasiSuratController@klasifikasi_surat_add');
Route::post('klasifikasi_surat/simpan', 'KlasifikasiSuratController@klasifikasi_surat_store');
Route::get('klasifikasi_surat/ubah/{klasifikasi_surat}', 'KlasifikasiSuratController@klasifikasi_surat_edit');
Route::patch('klasifikasi_surat/update/{klasifikasi_surat}', 'KlasifikasiSuratController@klasifikasi_surat_update');
Route::delete('klasifikasi_surat/hapus/{klasifikasi_surat}', 'KlasifikasiSuratController@klasifikasi_surat_destroy');

Route::get('surat_masuk/scanning', 'SuratMasukController@scanning');
Route::get('surat_masuk/agenda', 'SuratMasukController@agenda');
Route::get('surat_masuk/disposisi', 'SuratMasukController@disposisi');
Route::get('surat_keluar/agenda', 'SuratKeluarController@agenda');

Route::get('supporting/email', 'SupportingController@email');
Route::get('supporting/kalender', 'SupportingController@kalender');

