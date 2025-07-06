<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Menampilkan SEMUA laporan kepada publik.
     */
    public function index()
    {
        // Ambil semua laporan, urutkan dari yang terbaru
        $laporans = Laporan::with('user')->latest()->get();
        
        // Kirim data ke view 'main.laporan'
        return view('main.laporan', compact('laporans'));
    }

    /**
     * Menyimpan laporan baru. Bisa oleh tamu atau user yang login.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form (sama seperti sebelumnya)
        $validatedData = $request->validate([
            'jenis_kegiatan' => 'required|string|max:255',
            'nama_kelompok' => 'required|string|max:255',
            'ketua_kelompok' => 'required|string|max:255',
            'tanggal_laporan' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
        ]);

        // 2. Upload File (sama seperti sebelumnya)
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('laporan-files', 'public');
            $validatedData['file'] = $filePath;
        }

        // 3. Cek apakah ada user yang login, jika ada, tambahkan user_id
        if (Auth::check()) {
            $validatedData['user_id'] = Auth::id();
        }

        // 4. Simpan ke database
        Laporan::create($validatedData);

        // 5. Kembali ke halaman laporan dengan pesan sukses
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }
    
    /**
     * Menghapus laporan.
     */
    public function destroy(Laporan $laporan)
    {
        // Pengecekan Otorisasi:
        // Hanya user yang login DAN user tersebut adalah pemilik laporan yang bisa menghapus.
        // Laporan yang dibuat oleh tamu (user_id = null) tidak bisa dihapus lewat sini.
        if (!Auth::check() || Auth::id() !== $laporan->user_id) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MENGHAPUS DATA INI.');
        }

        // Hapus file dari storage
        Storage::disk('public')->delete($laporan->file);

        // Hapus record dari database
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}