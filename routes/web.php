<?php

use App\Http\Controllers\ChartsController;
use App\Http\Controllers\TabelsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChartsController::class, "DummyData"]);
Route::get('/data_tim_kerja', [TabelsController::class, "TimKerja"]);
Route::get('/target_kinerja', [TabelsController::class, 'KinerjaData']);
Route::get('/realisasi', [TabelsController::class, 'Realisasi']);
