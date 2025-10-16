<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔸 Redirect halaman utama ke login kalau belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔸 Route untuk login & register (tanpa login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// 🔸 Proteksi semua route CRUD (hanya bisa diakses kalau sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('barangs.index');
    })->name('dashboard');

    Route::resource('barangs', BarangController::class);
    Route::resource('barang_masuks', BarangMasukController::class);
    Route::resource('barang_keluars', BarangKeluarController::class);

    // 🔸 Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
