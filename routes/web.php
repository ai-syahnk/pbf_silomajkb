<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\PesertaAuthController;
use App\Http\Controllers\PesertaProfilController;
use App\Models\Kompetisi;
use App\Models\Peserta;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.web.beranda');
})->name('web.beranda');

Route::get('/kompetisi', function () {
    $kompetisi = Kompetisi::latest()->paginate(6);

    return view('content.web.kompetisi.index', compact('kompetisi'));
})->name('web.kompetisi');

Route::get('/kompetisi/{id}', function ($id) {
    $kompetisi = Kompetisi::findOrFail($id);
    $peserta = Peserta::with('user')->where('user_id', auth()->id())->first();
    
    return view('content.web.kompetisi.detail', compact('kompetisi', 'peserta'));
})->name('web.kompetisi.detail');

Route::get('/portal-login', function () {
    return view('content.web.auth.index');
})->name('web.portal.login');

Route::get('/peserta/login', [PesertaAuthController::class, 'showLoginForm'])->name('peserta.login');
Route::post('/peserta/login', [PesertaAuthController::class, 'login'])->name('peserta.login.submit');
Route::post('/peserta/logout', [PesertaAuthController::class, 'logout'])->name('peserta.logout');

Route::get('/peserta/register', [PesertaAuthController::class, 'showRegisterForm'])->name('peserta.register');
Route::post('/peserta/register', [PesertaAuthController::class, 'register'])->name('peserta.register.submit');

// Peserta Panel (dilindungi middleware role peserta)
Route::middleware('peserta')->prefix('peserta')->group(function () {
    Route::get('/dashboard', function () {
        return view('content.panel.peserta.dashboard');
    })->name('peserta.dashboard');

    Route::get('/profil', [PesertaProfilController::class, 'edit'])->name('peserta.profil');
    Route::post('/profil', [PesertaProfilController::class, 'update']);
    Route::put('/profil', [PesertaProfilController::class, 'update'])->name('peserta.profil.update');
    Route::post('/profil/portofolio', [PesertaProfilController::class, 'destroyPortofolio']);
    Route::post('/profil/ktm', [PesertaProfilController::class, 'destroyKtm']);
    Route::delete('/profil/portofolio', [PesertaProfilController::class, 'destroyPortofolio'])->name('peserta.profil.portofolio.destroy');
    Route::delete('/profil/ktm', [PesertaProfilController::class, 'destroyKtm'])->name('peserta.profil.ktm.destroy');
});

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel (dilindungi middleware)
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('content.panel.admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/kompetisi', [KompetisiController::class, 'index'])->name('admin.kompetisi');
    Route::get('/kompetisi/create', [KompetisiController::class, 'create'])->name('admin.kompetisi.create');
    Route::post('/kompetisi', [KompetisiController::class, 'store'])->name('admin.kompetisi.store');
    Route::get('/kompetisi/{kompetisi}/edit', [KompetisiController::class, 'edit'])->name('admin.kompetisi.edit');
    Route::put('/kompetisi/{kompetisi}', [KompetisiController::class, 'update'])->name('admin.kompetisi.update');
    Route::delete('/kompetisi/{kompetisi}', [KompetisiController::class, 'destroy'])->name('admin.kompetisi.destroy');
});
