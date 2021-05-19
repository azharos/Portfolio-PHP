<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekRoute;

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

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'store']);

Route::middleware(['CekAdmin'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout']);

    // Kandidat
    Route::get('/kandidat', [KandidatController::class, 'index']);
    Route::get('/kandidat/{id}', [KandidatController::class, 'edit']);
    Route::put('/kandidat/{id}', [KandidatController::class, 'update']);
    Route::post('/kandidat-tambah', [KandidatController::class, 'store']);
    Route::delete('/kandidat/{id}', [KandidatController::class, 'destroy']);

    // Kriteria
    Route::get('/kriteria', [KriteriaController::class, 'index']);
    Route::post('/kriteria-tambah', [KriteriaController::class, 'store']);
    Route::put('/kriteria/{id}', [KriteriaController::class, 'update']);
    Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy']);

    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->middleware('CekRoute');
    Route::post('/perhitungan', [PerhitunganController::class, 'index'])->middleware('CekRoute');
    Route::get('/perhitungan/{id}', [PerhitunganController::class, 'create']);
    Route::post('/perhitungan/{id}', [PerhitunganController::class, 'store']);
    Route::put('/perhitungan/{id}', [PerhitunganController::class, 'update']);

    Route::get('/hasil', [PerhitunganController::class, 'hasil_kriteria']);
    Route::post('/hasil', [PerhitunganController::class, 'hasil_kandidat']);
    Route::post('/hasil/kandidat/{id_kandidat}', [PerhitunganController::class, 'store3']);
    Route::post('/hasil/{id_kriteria}', [PerhitunganController::class, 'store2']);
});
