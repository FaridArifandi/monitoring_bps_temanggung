<?php

use Illuminate\Support\Facades\Route;
use App\Models\Charts;

Route::get('/', function () {
    $chartData = Charts::getDummyData();
    return view('pages.dashboard', ['chartData' => $chartData]);
});

Route::get('/data_tim_kerja', function () {
    return view('pages.data_tim_kerja');
});

Route::get('/target_kinerja', function () {
    return view('pages.target_kinerja');
});

Route::get('/realisasi', function () {
    return view('pages.realisasi');
});
