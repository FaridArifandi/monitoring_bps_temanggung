<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimKerjaController;
use App\Http\Controllers\TabKinerjaController;
use App\Http\Controllers\DashMonitoringController;

Route::get('/', [DashMonitoringController::class, 'index'])->name('dashboard.index');
Route::get('/data_tim_kerja', [TimKerjaController::class, "index"]);
Route::get('/target_kinerja', [TabKinerjaController::class, 'index']);
Route::get('/realisasi', [TabKinerjaController::class, 'index']);
