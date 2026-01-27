<?php
    
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome'); // Pastikan ini mengarah ke welcome
});

// ... (route-route lainnya tetap seperti sebelumnya)

// LOGIKA REDIRECT DASHBOARD
Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile (Semua Role)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // GRUP KHUSUS ADMIN
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('buku', BukuController::class);
        Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota']);
    });

    // GRUP KHUSUS USER
    Route::middleware(['role:user'])->group(function () {
        Route::get('/jelajahi', [PeminjamanController::class, 'indexUser'])->name('peminjaman.index');
        Route::post('/pinjam/{id}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
        Route::patch('/kembali-buku/{id}', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
    });
});

require __DIR__ . '/auth.php';