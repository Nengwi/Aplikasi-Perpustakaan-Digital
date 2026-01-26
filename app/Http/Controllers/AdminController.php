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
    // Menggunakan count() lebih aman karena tidak perlu nama kolom spesifik
    $totalBuku = Buku::count(); 
    $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();
    $totalUser = User::where('role', 'user')->count();
    
    $recentPeminjaman = Peminjaman::with(['user', 'buku'])
                        ->latest()
                        ->take(5)
                        ->get();

    return view('admin.dashboard', compact('totalBuku', 'bukuDipinjam', 'totalUser', 'recentPeminjaman'));
}
}