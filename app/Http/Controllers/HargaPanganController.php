<?php

namespace App\Http\Controllers;

use App\Models\HargaPangan;
use Illuminate\Http\Request;

class HargaPanganController extends Controller
{
    /**
     * Menampilkan daftar semua harga pangan (Halaman utama).
     */
    public function index()
    {
        $semua_harga = HargaPangan::orderBy('created_at', 'desc')->get();
        return view('admin.superadmin.harga-pangan', compact('semua_harga'));
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input, dan simpan hasilnya ke variabel
        $validatedData = $request->validate([
            'nama_pangan' => 'required|string|max:255',
            'harga_pangan' => 'required|integer|min:0',
        ]);

        // 2. Gunakan variabel yang sudah divalidasi, bukan $request->all()
        HargaPangan::create($validatedData);

        // 3. Arahkan kembali ke halaman utama dengan pesan sukses
        return redirect()->route('admin.harga-pangan.index')
                         ->with('success', 'Harga pangan berhasil ditambahkan!');
    }

    /**
     * Mengupdate data yang sudah ada di database.
     */
    public function update(Request $request, HargaPangan $hargaPangan)
    {
        // 1. Validasi input, dan simpan hasilnya ke variabel
        $validatedData = $request->validate([
            'nama_pangan' => 'required|string|max:255',
            'harga_pangan' => 'required|integer|min:0',
        ]);

        // 2. Update data menggunakan variabel yang sudah divalidasi
        $hargaPangan->update($validatedData);

        // 3. Arahkan kembali ke halaman utama dengan pesan sukses
        return redirect()->route('admin.harga-pangan.index')
                         ->with('success', 'Harga pangan berhasil diupdate!');
    }

    // ... sisa fungsi lainnya (index, create, edit, destroy) tidak perlu diubah ...
    
    public function create()
    {
        return redirect()->route('admin.harga-pangan.index');
    }

    public function edit(HargaPangan $hargaPangan)
    {
        return redirect()->route('admin.harga-pangan.index');
    }

    public function destroy(HargaPangan $hargaPangan)
    {
        $hargaPangan->delete();
        return redirect()->route('admin.harga-pangan.index')
                         ->with('success', 'Harga pangan berhasil dihapus!');
    }
}