<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HargaPangan;
use App\Models\Berita;
use PDF;
use App\Models\KwtGallery; // [DITAMBAHKAN DI SINI] Import model untuk galeri

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage).
     */
    public function index()
    {
        // Kode yang sudah ada (tidak diubah)
        $semua_harga = HargaPangan::orderBy('nama_pangan', 'asc')->get();
        $berita_terbaru = Berita::latest()->take(4)->get();

        // [DITAMBAHKAN DI SINI] Mengambil 10 gambar terbaru dari galeri
        $kwt_galleries = KwtGallery::latest()->take(10)->get();

        // Mengirim semua data (termasuk galeri) ke view
        return view('index', [
            'semua_harga' => $semua_harga,
            'berita_terbaru' => $berita_terbaru,
            'kwt_galleries' => $kwt_galleries, // [DITAMBAHKAN DI SINI]
        ]);
    }

    /**
     * Menampilkan halaman sambutan kepala dinas.
     */
    public function showSambutan()
    {
        $berita_terbaru = Berita::latest()->take(4)->get();
        return view('menu.sambutan_kepala_dinas', [
            'berita_terbaru' => $berita_terbaru
        ]);
    }

    // !!! FUNGSI-FUNGSI BARU DITAMBAHKAN DI SINI !!!

    /**
     * Menampilkan halaman dasar hukum.
     */
    public function showDasarHukum()
    {
        $berita_terbaru = Berita::latest()->take(4)->get();
        return view('menu.dasar_hukum', [
            'berita_terbaru' => $berita_terbaru
        ]);
    }

    /**
     * Menampilkan halaman tentang kami.
     */
    public function showTentangKami()
    {
        $berita_terbaru = Berita::latest()->take(4)->get();
        return view('menu.tentang_kami', [
            'berita_terbaru' => $berita_terbaru
        ]);
    }

    /**
     * Menampilkan halaman struktur organisasi.
     */
    public function showStrukturOrganisasi()
    {
        $berita_terbaru = Berita::latest()->take(4)->get();
        return view('menu.struktur_organisasi', [
            'berita_terbaru' => $berita_terbaru
        ]);
    }


    /**
     * Membuat dan mengunduh file PDF berisi harga pangan.
     */
    public function downloadPDF()
    {
        $data_harga = HargaPangan::orderBy('nama_pangan', 'asc')->get();
        $data = ['semua_harga' => $data_harga];
        $pdf = PDF::loadView('pdf.harga_pangan_pdf', $data);
        $nama_file = 'laporan-harga-pangan-' . date('d-m-Y') . '.pdf';
        return $pdf->download($nama_file);
    }
}
