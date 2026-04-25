<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.web.beranda');
})->name('web.beranda');

Route::get('/kompetisi', function () {
    return view('content.web.kompetisi.index');
})->name('web.kompetisi');

Route::get('/kompetisi/{slug}', function ($slug) {
    return view('content.web.kompetisi.detail', ['slug' => $slug]);
})->name('web.kompetisi.detail');

Route::get('/portal-login', function () {
    return view('content.web.auth.index');
})->name('web.portal.login');