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
});
