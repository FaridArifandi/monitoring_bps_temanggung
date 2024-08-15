<?php

use Illuminate\Support\Facades\Route;
use App\Models\Charts;
use App\Models\Tabels;

Route::get('/', function () {
    $chartData = Charts::getDummyData();
    return view('pages.dashboard', ['chartData' => $chartData]);
});

Route::get('/data_tim_kerja', function () {
    $data = Tabels::getTimData();
    return view('pages.data_tim_kerja', ['data' => $data]);
});

Route::get('/target_kinerja', function () {
    $data = Tabels::getKinerjaData();
    return view('pages.target_kinerja', ['data' => $data]);
});

Route::get('/realisasi', function () {
    $data = Tabels::getKinerjaData();
    return view('pages.realisasi', ['data' => $data]);
});
