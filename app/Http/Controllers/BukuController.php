<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // 1. Menampilkan daftar buku untuk Admin
   public function index(Request $request)
{
    $search = $request->input('search');

    // Pastikan nama variabelnya $bukus (pake S) agar nyambung dengan Blade
    $bukus = Buku::when($search, function ($query, $search) {
        return $query->where('judul', 'like', "%{$search}%")
                     ->orWhere('penerbit', 'like', "%{$search}%")
                     ->orWhere('penulis', 'like', "%{$search}%");
    })->latest()->get(); // Atau ->paginate(10) kalau bukunya banyak

    // Kirim variabel $bukus ke view
    return view('buku.index', compact('bukus'));
}
    // 2. MENAMPILKAN FORM TAMBAH BUKU (Ini yang tadi hilang)
    public function create()
    {
        return view('buku.create');
    }

    // 3. Menampilkan daftar buku untuk User
    public function indexUser(Request $request)
    {
        $search = $request->input('search');

        $bukus = Buku::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('penulis', 'like', "%{$search}%");
            })
            ->get();

        return view('user.daftar-buku', compact('bukus'));
    }

    // 4. Menyimpan data buku baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    // 5. Menampilkan form edit buku
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    // 6. Mengupdate data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Data buku "' . $buku->judul . '" berhasil diperbarui!');
    }

    // 7. Menghapus buku
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku "' . $buku->judul . '" berhasil dihapus.');
    }
}