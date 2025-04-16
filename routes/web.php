<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OutletController;

// Route untuk Landing Page (Beranda)
Route::get('/', [PageController::class, 'home'])->name('home');

// Route untuk Halaman Lainnya
Route::get('/produk', [PageController::class, 'produk'])->name('produk');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/outlet', [PageController::class, 'outlet'])->name('outlet');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/outlets', [PageController::class, 'outlet'])->name('outlet');