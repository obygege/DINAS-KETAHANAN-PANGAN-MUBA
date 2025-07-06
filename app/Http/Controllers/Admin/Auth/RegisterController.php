<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Method untuk menampilkan form registrasi admin
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    // Method untuk menyimpan data admin baru
    public function store(Request $request)
    {
        // 1. Validasi semua input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|min:16|max:20|unique:admins,nip',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,superadmin',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional, harus gambar, maks 2MB
        ]);

        // 2. Proses upload avatar jika ada
        if ($request->hasFile('avatar')) {
            $filePath = $request->file('avatar')->store('avatars/admins', 'public');
            $validatedData['avatar'] = $filePath;
        }

        // 3. Simpan data ke tabel 'admins'
        // Password akan otomatis di-hash karena pengaturan di Model Admin
        Admin::create($validatedData);

        // 4. Arahkan ke halaman login admin dengan notifikasi sukses
        // Kita akan buat route 'admin.login.form' nanti
        return redirect()->route('admin.index')
                         ->with('success', 'Admin baru berhasil didaftarkan! Silakan login.');
    }
}