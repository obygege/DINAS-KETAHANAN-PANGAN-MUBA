<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kelompok',
        'alamat',
        'ketua_kelompok',
        'file',
        'keterangan',
        'user_id',
    ];

    /**
     * ======================================================
     * == TAMBAHKAN FUNGSI INI UNTUK MEMPERBAIKI ERROR ======
     * ======================================================
     * Mendefinisikan relasi "belongsTo":
     * Fungsi ini memberitahu Laravel bahwa setiap Proposal "dimiliki oleh" satu User.
     * Ini tidak akan merusak fungsi yang sudah ada.
     */
    public function user()
    {
        // Eloquent akan otomatis menghubungkan kolom 'user_id' di tabel 'proposals'
        // dengan 'id' di tabel 'users'.
        return $this->belongsTo(User::class);
    }
}