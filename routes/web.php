<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\KontenController;

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
        'fasilitas' => 'fasilitas'
    ]);
    
    // Resource Konten
    Route::resource('konten', KontenController::class);
});