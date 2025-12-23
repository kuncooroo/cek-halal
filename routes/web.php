<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
// Halaman Cek Produk
Route::get('/cek-produk', [PageController::class, 'cekProduk'])->name('cek-produk');
// Endpoint untuk pencarian (AJAX)
Route::post('/cari-produk', [PageController::class, 'cariProduk'])->name('cari-produk');

// Berita & FAQ
Route::get('/berita', [PageController::class, 'berita'])->name('berita.index');
Route::get('/berita/{id}', [PageController::class, 'beritaDetail'])->name('berita.detail'); // Jika perlu detail
Route::get('/faq', [PageController::class, 'faq'])->name('faq.index');

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('produk', ProdukController::class);
        Route::resource('berita', BeritaController::class);
        Route::resource('faq', FaqController::class);

    });
});


