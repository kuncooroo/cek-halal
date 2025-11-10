<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

// Rute Autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Grup Rute Admin (Dilindungi middleware auth & role)
Route::prefix('admin')->middleware(['auth', 'role:admin,superadmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('produk', ProdukController::class)->names('admin.produk');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('faq', FaqController::class)->names('admin.faq');

    // (Anda tidak perlu rute CRUD user karena superadmin mendaftarkan via phpmyadmin)
});
