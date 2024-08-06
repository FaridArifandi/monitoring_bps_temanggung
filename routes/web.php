<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', [
        "name" => "BPS",
        "email" => "bps@gmail.com",
        "img" => "kantor-bps.jpg"
    ]);
});

Route::get('/blog', function () {
    return view('posts');
});

Route::get('/laravel', function () {
    return view('welcome');
});
