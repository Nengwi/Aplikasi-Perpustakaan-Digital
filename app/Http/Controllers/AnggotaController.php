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

    Anggota::create($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
