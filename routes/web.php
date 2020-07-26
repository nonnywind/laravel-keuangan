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

use App\Http\Controllers\SumberController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // ini untuk management sumber pemasukan
    Route::get('sumber-pemasukan', 'SumberController@index');
    Route::get('sumber-pemasukan/add', 'SumberController@add');
    Route::post('sumber-pemasukan/add', 'SumberController@store');
    Route::get('sumber-pemasukan/{id}', 'SumberController@edit');
    Route::put('sumber-pemasukan/{id}', 'SumberController@update');
    Route::delete('sumber-pemasukan/{id}', 'SumberController@delete');

    // manage pemasukan
    Route::get('pemasukan', 'PemasukanController@index');
    Route::get('pemasukan/yajra', 'PemasukanController@yajra');
    Route::get('pemasukan/add', 'PemasukanController@add');
    Route::post('pemasukan/add', 'PemasukanController@store');
    Route::get('pemasukan/{id}', 'PemasukanController@edit');
    Route::put('pemasukan/{id}', 'PemasukanController@update');
    Route::delete('pemasukan/{id}', 'PemasukanController@delete');

    // manage pengeluaran
    Route::get('pengeluaran', 'PengeluaranController@index');
    Route::get('pengeluaran/add', 'PengeluaranController@add');
    Route::post('pengeluaran/add', 'PengeluaranController@store');
    Route::get('pengeluaran/{id}', 'PengeluaranController@edit');
    Route::put('pengeluaran/{id}', 'PengeluaranController@update');
    Route::delete('pengeluaran/{id}', 'PengeluaranController@delete');

    // laporan keuangan
    Route::get('laporan', 'LaporanController@index');
    Route::get('cari-laporan', 'LaporanController@cari');
    Route::get('export-pemasukan/{dari}/{sampai}', 'LaporanController@export_pemasukan');
    Route::get('export-pengeluaran/{dari}/{sampai}', 'LaporanController@export_pengeluaran');
});

Route::get('add-user', function () {
    \DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'noni@gmail.com',
        'password' => bcrypt('123'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_At' => date('Y-m-d H:i:s')
    ]);
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});

Route::get('keluar', function () {
    \Auth::logout();

    return redirect('login');
});
