<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil data statistik untuk dashboard
        $totalBuku = Buku::sum('jumlah'); // Total stok buku
        $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count(); // Buku yang belum kembali
        $totalUser = User::where('role', 'user')->count(); // Total anggota (bukan admin)
        
        // Mengambil 5 transaksi terbaru untuk tabel
        $recentPeminjaman = Peminjaman::with(['user', 'buku'])
                            ->latest()
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact(
            'totalBuku', 
            'bukuDipinjam', 
            'totalUser', 
            'recentPeminjaman'
        ));
    }
}