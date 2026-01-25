<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Middleware untuk SEMUA yang sudah Login
Route::middleware('auth')->group(function () {
    
    // Profile (Bisa diakses Admin maupun User)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // KHUSUS ADMIN (Sesuai Screenshot: CRUD Buku & Anggota)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('buku', BukuController::class);
        Route::resource('anggota', AnggotaController::class)->parameters([
            'anggota' => 'anggota'
        ]);
    });

    // KHUSUS USER (Sesuai Screenshot: Peminjaman & Pengembalian)
    Route::middleware(['role:user'])->group(function () {
        // Nanti kita isi route Peminjaman di sini
        // Route::resource('peminjaman', PeminjamanController::class);
    });
});

require __DIR__.'/auth.php';