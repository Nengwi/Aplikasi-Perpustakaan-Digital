<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // 1. GUNAKAN VERSI INI SAJA (Hapus indexUser yang lama)
    public function indexUser(Request $request) 
    {
        $search = $request->input('search');

        $bukus = Buku::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('penerbit', 'like', "%{$search}%")
                         ->orWhere('tahun_terbit', 'like', "%{$search}%");
        })->get();

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

        return redirect()->route('peminjaman.riwayat')->with('success', 'Buku "' . $buku->judul . '" berhasil dipinjam!');
    }

    public function riwayat()
    {
        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('peminjaman.riwayat', compact('peminjamans'));
    }

    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);

        $buku = Buku::find($peminjaman->buku_id);
        $buku->increment('stok');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan!');
    }
}