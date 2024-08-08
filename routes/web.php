<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/blog', function () {
    return view('posts');
});

Route::get('/laravel', function () {
    return view('welcome');
});
