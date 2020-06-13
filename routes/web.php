<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => '_sysadmin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('', 'SysAdminController@beranda')->name('admin.beranda');

    Route::group(['prefix' => 'fasilitas'], function () {
        Route::get('', 'Admin\FasilitasController@index')->name('admin.fasilitas');
        Route::post('', 'Admin\FasilitasController@store')->name('admin.fasilitas.simpan');
        Route::patch('{fasilitas}', 'Admin\FasilitasController@update')->name('admin.fasilitas.edit');
        Route::delete('{fasilitas}', 'Admin\FasilitasController@destroy')->name('admin.fasilitas.hapus');
    });

    Route::group(['prefix' => 'kamar'], function () {
        Route::get('', 'Admin\KamarController@index')->name('admin.kamar');
        Route::post('', 'Admin\KamarController@store')->name('admin.kamar.simpan');
        Route::patch('{kamar}', 'Admin\KamarController@update')->name('admin.kamar.edit');
        Route::delete('{kamar}', 'Admin\KamarController@destroy')->name('admin.kamar.hapus');
    });

    Route::group(['prefix' => 'token'], function () {
        Route::get('', 'Admin\TokenController@index')->name('admin.token');
        Route::post('', 'Admin\TokenController@store')->name('admin.token.simpan');
        Route::patch('{token}', 'Admin\TokenController@update')->name('admin.token.edit');
        Route::delete('{token}', 'Admin\TokenController@destroy')->name('admin.token.hapus');
    });

    Route::group(['prefix' => 'penyewa'], function () {
        Route::get('', 'Admin\PenyewaController@index')->name('admin.penyewa');
        Route::get('profil/{id}', 'Admin\PenyewaController@profil')->name('admin.penyewa.profil');
        Route::post('', 'Admin\PenyewaController@store')->name('admin.penyewa.simpan');
        Route::patch('{penyewa}', 'Admin\PenyewaController@update')->name('admin.penyewa.edit');
        Route::delete('{penyewa}', 'Admin\PenyewaController@destroy')->name('admin.penyewa.hapus');
    });

    Route::group(['prefix' => 'laporan'], function () {
        Route::get('penyewa', 'LaporanController@penyewa')->name('admin.laporan.penyewa');
    });
});
