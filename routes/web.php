<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProdukController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\FaqController;
use App\Http\Controllers\Public\TentangController;
use App\Http\Controllers\Public\KontakController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/search', [ProdukController::class, 'search'])->name('produk.search');
    Route::post('/scan-barcode', [ProdukController::class, 'scanBarcode'])->name('produk.scan');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak/submit', [KontakController::class, 'submit'])->name('kontak.submit');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('produk', AdminProdukController::class);
        Route::resource('berita', AdminBeritaController::class);
        Route::resource('penulis', PenulisController::class);
        Route::resource('faq', AdminFaqController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('admin', AdminController::class)->middleware('superadmin');
        Route::delete(
            'admin/{admin}/avatar',
            [AdminController::class, 'destroyAvatar']
        )->name('avatar.destroy')
            ->middleware('superadmin');
    });
});
