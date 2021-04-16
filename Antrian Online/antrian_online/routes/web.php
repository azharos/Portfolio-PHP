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

// use Illuminate\Routing\Route;

// auth
Route::get('/', 'AuthController@index');
Route::get('/login', 'AuthController@login');
Route::post('/', 'AuthController@store1');
Route::post('/login', 'AuthController@store2');
Route::get('/logout', 'AuthController@delete');

Route::get('app', 'UserController@index');
Route::get('/app/profile', 'UserController@edit');
Route::patch('app/profile', 'UserController@update1');
Route::patch('app/password', 'UserController@update2');

Route::get('loket', 'UserController@loket');
Route::post('loket/add_loket', 'UserController@add_loket');
Route::post('loket/loket_antrian', 'UserController@antrian');
Route::get('loket/loket_antrian', 'UserController@antrian');
Route::post('loket/next_antrian', 'UserController@next_antrian');
Route::post('pdf-antrian-user', 'UserController@pdfAntrianUser');
Route::post('loket/{id_user}', 'UserController@store1');
Route::delete('loket/{nama_loket}/delete', 'UserController@delete1');

Route::get('laporan', 'UserController@laporan');
Route::post('laporan/{tanggal}', 'UserController@pdfLaporan');
