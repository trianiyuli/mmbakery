<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\AuthController;

// Route untuk Landing Page (Beranda)
Route::get('/', [PageController::class, 'home'])->name('home');

// Route untuk Halaman Lainnya
Route::get('/produk', [PageController::class, 'produk'])->name('produk');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/outlet', [PageController::class, 'outlet'])->name('outlet');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
// Route::get('/outlets', [PageController::class, 'outlet'])->name('outlet');

// Login & Admin
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/products', [AuthController::class, 'products'])->name('admin.products');
    Route::get('/admin/users', [AuthController::class, 'users'])->name('admin.users');
    Route::get('/admin/settings', [AuthController::class, 'settings'])->name('admin.settings');
    Route::get('/admin/reports', [AuthController::class, 'reports'])->name('admin.reports');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
