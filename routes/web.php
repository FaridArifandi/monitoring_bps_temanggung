<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
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
