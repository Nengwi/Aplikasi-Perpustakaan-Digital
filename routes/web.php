<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController; 
use App\Http\Controllers\PeminjamanController;

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
        // Halaman di mana user bisa lihat daftar buku untuk dipinjam
        Route::get('/pinjam-buku', [BukuController::class, 'indexUser'])->name('peminjaman.index');
        
        // Simpan transaksi peminjaman
        Route::post('/pinjam-buku/{id}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    });
});

require __DIR__.'/auth.php';