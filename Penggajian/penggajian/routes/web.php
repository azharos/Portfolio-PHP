<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PotonganGajiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


Route::get('/', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/', [AuthController::class, 'login']);

Route::middleware(['CekStatus'])->group(function () {
    Route::get('/app/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/ubah-password', [AuthController::class, 'password']);
    Route::put('/ubah-password', [AuthController::class, 'ubahPassword']);

    // User
    Route::middleware(['CekUser'])->group(function () {
        Route::get('/user/data-gaji', [UserController::class, 'dataGaji']);
        Route::post('/user/cetakslip/{id}', [UserController::class, 'cetakGaji']);
    });

    // Admin
    Route::middleware(['CekAdmin'])->group(function () {
        // Jabatan
        Route::get('/admin/jabatan', [JabatanController::class, 'index']);
        Route::get('/admin/jabatan/tambah', [JabatanController::class, 'create']);
        Route::get('/admin/jabatan/edit/{id}', [JabatanController::class, 'edit']);
        Route::post('/admin/jabatan', [JabatanController::class, 'store']);
        Route::put('/admin/jabatan/{id}', [JabatanController::class, 'update']);
        Route::delete('/admin/jabatan/{id}', [JabatanController::class, 'destroy']);

        // Pegawai
        Route::get('/admin/pegawai', [PegawaiController::class, 'index']);
        Route::get('/admin/pegawai/tambah', [PegawaiController::class, 'create']);
        Route::get('/admin/data-gaji', [PegawaiController::class, 'dataGaji']);
        Route::get('/admin/pegawai/cetak-gaji', [PegawaiController::class, 'cetakGaji']);
        Route::get('/admin/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
        Route::post('/admin/pegawai', [PegawaiController::class, 'store']);
        Route::put('/admin/pegawai/{id}', [PegawaiController::class, 'update']);
        Route::delete('/admin/pegawai/{id}', [PegawaiController::class, 'destroy']);

        // Absensi
        Route::get('/admin/absensi', [AbsensiController::class, 'index']);
        Route::get('/admin/absensi/input-absensi', [AbsensiController::class, 'inputAbsensi']);
        Route::post('/admin/absensi/input-absensi', [AbsensiController::class, 'store']);
        Route::post('/admin/cetak-absensi', [AbsensiController::class, 'cetakAbsensi']);

        // Potongan Gaji
        Route::get('/admin/potongan-gaji', [PotonganGajiController::class, 'index']);
        Route::get('/admin/potongan/tambah', [PotonganGajiController::class, 'create']);
        Route::get('/admin/potongan/edit/{id}', [PotonganGajiController::class, 'edit']);
        Route::put('/admin/potongan/{id}', [PotonganGajiController::class, 'update']);
        Route::post('/admin/potongan-gaji', [PotonganGajiController::class, 'store']);
        Route::delete('/admin/potongan/{id}', [PotonganGajiController::class, 'destroy']);

        // Other
        Route::get('/admin/laporan-gaji', [PegawaiController::class, 'laporanGaji']);
        Route::get('/admin/laporan-absensi', [AbsensiController::class, 'laporanAbsensi']);
        Route::get('/admin/slip-gaji', [PegawaiController::class, 'SlipGaji']);
        Route::post('/admin/cetak-slip-gaji', [PegawaiController::class, 'cetakSlipGaji']);
    });
});
