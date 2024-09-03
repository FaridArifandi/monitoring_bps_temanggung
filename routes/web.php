<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TabKinerjaKinerjas;
use App\Http\Controllers\TimKerjaController;
use App\Http\Controllers\TabKinerjaController;
use App\Http\Controllers\DashMonitoringController;

Route::get('/', [DashMonitoringController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/login', [LoginController::class, "index"])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/data_tim_kerja', [TimKerjaController::class, "index"])->middleware('auth');

Route::get('/target_kinerja', [TabKinerjaController::class, 'index'])->middleware('auth');
Route::post('/target_kinerja', [TabKinerjaController::class, 'store'])->middleware('auth');
Route::resource('/target_kinerja/kinerjas', TabKinerjaKinerjas::class)->middleware('auth');


Route::get('/realisasi', [TabKinerjaController::class, 'index'])->middleware('auth');
