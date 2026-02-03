<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. HALAMAN UTAMA (WELCOME)
Route::get('/', function () {
    return view('welcome');
});

// 2. LOGIKA REDIRECT DASHBOARD (Setelah Login)
Route::get('/dashboard', function () {
    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Cek Role menggunakan Spatie
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    // Jika bukan admin, ke dashboard user biasa
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. GRUP RUTE TERAUTENTIKASI (Harus Login)
Route::middleware('auth')->group(function () {

    // --- PROFILE (Bisa diakses Admin & User) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- GRUP KHUSUS ADMIN (Middleware Spatie) ---
    Route::middleware(['role:admin'])->group(function () {
        // Halaman Utama Admin
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // Kelola Data Buku
        Route::resource('buku', BukuController::class);
        
        // Kelola Data Anggota
        Route::resource('anggota', AnggotaController::class)->parameters([
            'anggota' => 'anggota'
        ]);
    });

    // --- GRUP KHUSUS USER / ANGGOTA ---
    Route::middleware(['role:user'])->group(function () {
        // Menu Jelajah Buku untuk dipinjam
        Route::get('/jelajahi', [PeminjamanController::class, 'indexUser'])->name('peminjaman.index');
        
        // Proses Pinjam Buku
        Route::post('/pinjam/{id}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        
        // Lihat Riwayat Peminjaman Pribadi
        Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
        
        // Pengembalian Buku
        Route::patch('/kembali-buku/{id}', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
    });

});

// 4. AUTH ROUTES (Login, Register, Logout dari Breeze/Jetstream)
require __DIR__ . '/auth.php';