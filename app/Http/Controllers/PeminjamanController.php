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

        // Cek apakah stok masih ada
        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }

        // Simpan data peminjaman
        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        // Kurangi stok buku
        $buku->decrement('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Buku "' . $buku->judul . '" berhasil dipinjam!');
    }

    public function riwayat()
{
    // Mengambil data peminjaman milik user yang login saja
    // 'buku' adalah nama relasi yang akan kita buat di Model sebentar lagi
    $riwayat = Peminjaman::with('buku')
                ->where('user_id', Auth::id())
                ->get();

    return view('user.riwayat', compact('riwayat'));
}
}