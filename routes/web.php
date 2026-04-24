<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.web.beranda');
})->name('web.beranda');

Route::get('/kompetisi', function () {
    return view('content.web.kompetisi');
})->name('web.kompetisi');
