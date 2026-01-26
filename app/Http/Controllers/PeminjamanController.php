<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function indexUser()
    {
        // Ambil semua buku untuk halaman "Jelajahi"
        $bukus = Buku::all();
        // Arahkan ke resources/views/peminjaman/index.blade.php
        return view('peminjaman.index', compact('bukus'));
    }

    public function store(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // 1. CEK APAKAH SUDAH PINJAM
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

        // 3. SIMPAN DATA
        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        // 4. KURANGI STOK
        $buku->decrement('stok');

        // Pindahkan ke riwayat setelah berhasil pinjam
        return redirect()->route('peminjaman.riwayat')->with('success', 'Buku "' . $buku->judul . '" berhasil dipinjam!');
    }

    public function riwayat()
    {
        // Ambil riwayat pinjam user yang sedang login
        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        // Samakan variabel ($peminjamans) dengan yang dipanggil di @forelse di file Blade
        return view('peminjaman.riwayat', compact('peminjamans'));
    }

    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Update status & tanggal kembali
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);

        // Kembalikan stok bukunya
        $buku = Buku::find($peminjaman->buku_id);
        $buku->increment('stok');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan!');
    }
}