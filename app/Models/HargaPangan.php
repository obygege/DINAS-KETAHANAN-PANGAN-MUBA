<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPangan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // !!! PASTIKAN BAGIAN INI ADA DAN LENGKAP !!!
    // Ini adalah "daftar tamu" yang boleh masuk ke database
    protected $fillable = [
        'nama_pangan',
        'harga_pangan',
    ];
}