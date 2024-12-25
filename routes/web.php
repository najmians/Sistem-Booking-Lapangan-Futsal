<?php

use App\Http\Controllers\FotoLapanganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('pelanggan', PelangganController::class);
Route::resource('lapangan', LapanganController::class);
Route::resource('foto_lapangan', FotoLapanganController::class);
