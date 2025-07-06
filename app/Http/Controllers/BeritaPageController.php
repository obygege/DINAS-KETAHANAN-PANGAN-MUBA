<?php
// app/Http/Controllers/BeritaPageController.php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaPageController extends Controller
{
    // Fungsi untuk menampilkan satu berita secara lengkap
    public function show(Berita $beritum) // Menggunakan Route Model Binding
    {
        // $beritum akan otomatis berisi data berita berdasarkan {id} di URL
        return view('berita_detail', ['berita' => $beritum]);
    }
}