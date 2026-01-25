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

    // 1. CEK APAKAH SUDAH PINJAM (Harus di awal!)
    $sudahPinjam = Peminjaman::where('user_id', Auth::id())
        ->where('buku_id', $id)
        ->where('status', 'dipinjam')
        ->exists();

    if ($sudahPinjam) {
        return redirect()->back()->with('error', 'Kamu sedang meminjam buku ini!');
    }

    // 2. CEK STOK
    if ($buku->stok <= 0) {
        return redirect()->back()->with('error', 'Stok buku habis!');
    }

    // 3. BARU SIMPAN DATA
    Peminjaman::create([
        'user_id' => Auth::id(),
        'buku_id' => $buku->id,
        'tanggal_pinjam' => now(),
        'status' => 'dipinjam',
    ]);

    // 4. KURANGI STOK
    $buku->decrement('stok');

    return redirect()->route('peminjaman.riwayat')->with('success', 'Buku "' . $buku->judul . '" berhasil dipinjam!');
}

    public function riwayat()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->latest() // Tambahkan ini agar yang terbaru di atas
            ->get();

        return view('user.riwayat', compact('riwayat'));
    }

    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // 1. Update status peminjaman
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);

        // 2. Tambahkan kembali stok bukunya
        $buku = Buku::find($peminjaman->buku_id);
        $buku->increment('stok');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
