<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan halaman manajemen berita
    public function index()
    {
        $semua_berita = Berita::latest()->get();
        return view('admin.superadmin.berita', compact('semua_berita'));
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // !!! PERBAIKAN DI SINI !!!
            // 1. Simpan gambar ke folder 'berita' di dalam disk 'public'.
            //    Ini akan mengembalikan path seperti 'berita/namafile.jpg'
            $path = $request->file('gambar')->store('berita', 'public');
            
            // 2. Simpan path tersebut ke database (tanpa basename).
            $validatedData['gambar'] = $path;
        }

        Berita::create($validatedData);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Mengupdate berita yang ada
    public function update(Request $request, Berita $beritum)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($beritum->gambar) {
                Storage::disk('public')->delete($beritum->gambar);
            }

            // !!! PERBAIKAN DI SINI JUGA !!!
            $path = $request->file('gambar')->store('berita', 'public');
            $validatedData['gambar'] = $path;
        }

        $beritum->update($validatedData);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    // Menghapus berita
    public function destroy(Berita $beritum)
    {
        if ($beritum->gambar) {
            Storage::disk('public')->delete($beritum->gambar);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
