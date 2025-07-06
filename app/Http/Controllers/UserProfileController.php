<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Menampilkan halaman form edit profil user.
     */
    public function show()
    {
        // Mengambil data user yang sedang login (menggunakan guard default 'web')
        $user = Auth::user(); 
        return view('main.profile', compact('user'));
    }

    /**
     * Mengupdate data profil user.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'nullable|string|max:255',
            // NIK harus unik kecuali untuk user itu sendiri
            'nik' => 'nullable|string|max:255|unique:users,nik,' . $user->id, 
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('nama')) {
            $user->nama = $request->nama;
        }

        if ($request->filled('nik')) {
            $user->nik = $request->nik;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Simpan avatar baru
            $path = $request->file('avatar')->store('user-avatars', 'public');
            $user->avatar = $path;
        }
        
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}