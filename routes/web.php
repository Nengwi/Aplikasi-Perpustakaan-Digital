<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// LOGIKA REDIRECT DASHBOARD (Pemisah Admin & User)
Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard'); // Mengarah ke resources/views/dashboard.blade.php
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile (Bisa diakses semua role)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // KHUSUS ADMIN
    Route::middleware(['role:admin'])->group(function () {
        // Route Dashboard khusus Admin
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::resource('buku', BukuController::class);
        Route::resource('anggota', AnggotaController::class)->parameters([
            'anggota' => 'anggota'
        ]);
    });

    // KHUSUS USER
    Route::middleware(['role:user'])->group(function () {
        Route::get('/pinjam-buku', [BukuController::class, 'indexUser'])->name('peminjaman.index');
        Route::post('/pinjam-buku/{id}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
        Route::patch('/kembali-buku/{id}', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
    });
    Route::middleware(['auth', 'role:user'])->group(function () {
    // Jalur untuk halaman Jelajahi
    Route::get('/jelajahi', [App\Http\Controllers\PeminjamanController::class, 'indexUser'])->name('peminjaman.index');
    
    // Jalur untuk proses meminjam (POST)
    Route::post('/pinjam/{id}', [App\Http\Controllers\PeminjamanController::class, 'store'])->name('peminjaman.store');
});
});

require __DIR__ . '/auth.php';
