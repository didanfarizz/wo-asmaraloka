<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    Route::resource('katalog', KatalogController::class);


    Route::get('/pemesanan', [AdminController::class, 'orders'])->name('pemesanan');
    Route::patch('/pemesanan/{id}/approve', [AdminController::class, 'approveOrder'])->name('pemesanan.approve');
    Route::delete('/pemesanan/{id}', [AdminController::class, 'destroyOrder'])->name('pemesanan.destroy');
});

// PUBLIK / USER
Route::get('/', [UserController::class, 'home'])->name('home');

// Detail katalog
Route::get('/paket/{id}', [UserController::class, 'show'])->name('paket.show');

// Form pemesanan (submit)
Route::post('/pesan', [OrderController::class, 'store'])->name('pesan.store');

Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');

Route::get('/cek-pesanan', function () {
    return view('user.cekpesanan');
})->name('cek.pesanan.form');

// Auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//ADMIN
// Route::get('dashboard', function () {
//     return view('admin.dashboard');
// });
