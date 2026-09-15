<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

// 1. Route Publik Pengunjung
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// 2. Route Autentikasi Admin
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});

// 3. Route Dashboard & CRUD Admin (Wajib Login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Fasilitas dengan penanganan custom parameter agar tidak dipotong jadi 'fasilita'
    Route::resource('fasilitas', FasilitasController::class)->parameters([
        'fasilitas' => 'fasilitas',
    ]);

    Route::get('/konten', [KontenController::class, 'index'])->name('konten.index');
    Route::get('/konten/{konten}/edit', [KontenController::class, 'edit'])->name('konten.edit');
    Route::put('/konten/{konten}', [KontenController::class, 'update'])->name('konten.update');
    Route::resource('paket', PaketController::class);
    Route::resource('media', MediaController::class)->parameters(['media' => 'media']);
    Route::get('/pengaturan', [PengaturanController::class, 'edit'])->name('pengaturan.edit');
    Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
});
