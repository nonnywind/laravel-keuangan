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
