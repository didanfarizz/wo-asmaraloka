<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('katalog', KatalogController::class);

    // Order (Pemesanan) - Menggunakan OrderController
    // OrderController harus memiliki method index, show, dan destroy
    Route::resource('pemesanan', OrderController::class)->except(['create', 'store', 'edit', 'update']);
    
    // Rute Tambahan untuk aksi approve (Setuju)
    // Asumsi: Method approveOrder ada di OrderController
    Route::patch('/pemesanan/{id}/approve', [OrderController::class, 'approveOrder'])->name('pemesanan.approve');

    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

    Route::resource('settings', SettingController::class);
});

// PUBLIK / USER
Route::get('/', [UserController::class, 'home'])->name('home');

// Detail katalog
Route::get('/paket/{id}', [UserController::class, 'show'])->name('paket.show');

// Form pemesanan (submit)
// Halaman form pemesanan (GET)
Route::get('/pesan/{id}', [UserController::class, 'pesanForm'])->name('pesan.form');

// Submit pemesanan (POST)
Route::post('/pesan/{id}', [OrderController::class, 'store'])->name('pesan.store');

Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');


Route::get('/cek-pesanan', function () {
    return view('user.cekpesanan');
})->name('cek.pesanan.form');

// Auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/cek-pesanan/cari', [OrderController::class, 'checkOrder'])->name('cek.pesanan.check'); 

//ADMIN
// Pemesanan Admin
Route::resource('pemesanan', OrderController::class)->names('admin.pemesanan.index');

// Route::get('dashboard', function () {
//     return view('admin.dashboard');
// });
