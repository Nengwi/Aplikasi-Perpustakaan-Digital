<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // Relasi ke Buku (Sudah kamu buat, ini sudah benar)
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Tambahan: Relasi ke User (Agar tahu siapa yang pinjam)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}