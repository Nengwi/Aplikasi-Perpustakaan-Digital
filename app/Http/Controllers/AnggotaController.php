<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota; // Pastikan ini sudah benar

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $anggotas = Anggota::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('nim', 'like', "%{$search}%");
    })->latest()->get();

    // Pastikan view-nya anggota.index
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

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:anggotas,nim,'.$anggota->id,
            'nomor_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}