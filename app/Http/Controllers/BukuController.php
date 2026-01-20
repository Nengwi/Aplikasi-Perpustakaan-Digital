<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); // Mengambil semua data buku
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }
}