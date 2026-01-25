<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $anggotas = Anggota::all();
    return view('anggota.index', compact('anggotas'));
}

public function create()
{
    return view('anggota.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:anggotas',
        'alamat' => 'required',
        'nomor_telepon' => 'required',
    ]);
    Anggota::create($request->only(['nama', 'nim', 'alamat', 'nomor_telepon']));

    return redirect()->route('anggota.index')->with('success', 'Anggota berhasil didaftarkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
{
    // Membuka halaman edit dengan membawa data anggota yang dipilih
    return view('anggota.edit', compact('anggota'));
}

public function update(Request $request, Anggota $anggota)
{
    // Validasi data
    $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:anggotas,nim,'.$anggota->id,
        'nomor_telepon' => 'required',
        'alamat' => 'required',
    ]);

    // Simpan perubahan
    $anggota->update($request->all());

    return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
{
    // Menghapus data anggota
    $anggota->delete();

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
}
}
