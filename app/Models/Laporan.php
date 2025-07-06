<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'laporans'; // Sesuaikan jika nama tabel Anda berbeda

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'jenis_kegiatan',
        'nama_kelompok',
        'ketua_kelompok',
        'tanggal_laporan',
        'file',
    ];
    

    /**
     * Mendefinisikan relasi "belongsTo" ke model User.
     * Setiap laporan dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}