<?php

use App\Http\Controllers\AdminAuthController;
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

Route::get('/peserta/login', function () {
    return view('content.web.auth.peserta.login');
})->name('web.peserta.login');

Route::get('/peserta/register', function () {
    return view('content.web.auth.peserta.register');
})->name('web.peserta.register');

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel (dilindungi middleware)
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('content.panel.admin.dashboard');
    })->name('admin.dashboard');
});
