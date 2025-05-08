<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}', [AdminController::class, 'showProduct'])->name('products.show');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroyProduct'])->name('products.destroy');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
