<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function store(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        $buku->decrement('stok');

        // PERBAIKAN: Redirect langsung ke halaman RIWAYAT setelah simpan data
        return redirect()->route('peminjaman.riwayat')->with('success', 'Buku "' . $buku->judul . '" berhasil dipinjam!');
    }

    public function riwayat()
    {
        // Fungsi ini tugasnya HANYA menampilkan halaman riwayat
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.riwayat', compact('riwayat'));
    }
}