<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TimKerjaController;
use App\Http\Controllers\TabKinerjaController;
use App\Http\Controllers\DashMonitoringController;

Route::get('/dashboard', [DashMonitoringController::class, 'index'])->name('dashboard.index');

Route::get('/login', [LoginController::class, "index"]);
Route::post('/login', [LoginController::class, "authenticate"]);
Route::get('/register', [RegisterController::class, "index"]);
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/data_tim_kerja', [TimKerjaController::class, "index"]);
Route::get('/target_kinerja', [TabKinerjaController::class, 'index']);
Route::get('/realisasi', [TabKinerjaController::class, 'index']);
