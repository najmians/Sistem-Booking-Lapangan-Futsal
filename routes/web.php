<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FotoLapanganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalLapanganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('lapangan', LapanganController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('foto_lapangan', FotoLapanganController::class);
        Route::resource('jadwal_lapangan', JadwalLapanganController::class);
    });

    Route::middleware(['role:admin,operator'])->group(function () {
        Route::resource('booking', BookingController::class);
    });
});
