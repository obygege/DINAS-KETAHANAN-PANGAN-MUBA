<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KwtGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KwtGalleryController extends Controller
{
    /**
     * Menampilkan semua gambar di galeri.
     */
    public function index()
    {
        $galleries = KwtGallery::latest()->paginate(12);
        // [NAMA FILE DIPERBAIKI DI SINI]
        return view('admin.superadmin.galeri-kwt', compact('galleries'));
    }

    /**
     * Menyimpan gambar baru yang di-upload.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maks 2MB
        ]);

        $path = $request->file('gambar')->store('kwt-galleries', 'public');

        KwtGallery::create(['gambar' => $path]);

        return redirect()->route('admin.kwt-gallery.index')->with('success', 'Gambar berhasil ditambahkan ke galeri.');
    }

    /**
     * Menghapus gambar dari galeri.
     */
    public function destroy(KwtGallery $kwt_gallery)
    {
        // Hapus file fisik dari storage
        if ($kwt_gallery->gambar && Storage::disk('public')->exists($kwt_gallery->gambar)) {
            Storage::disk('public')->delete($kwt_gallery->gambar);
        }

        // Hapus record dari database
        $kwt_gallery->delete();

        return redirect()->route('admin.kwt-gallery.index')->with('success', 'Gambar berhasil dihapus dari galeri.');
    }
}