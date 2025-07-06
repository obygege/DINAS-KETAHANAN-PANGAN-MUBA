<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Menampilkan halaman form edit profil admin.
     */
    public function showProfile()
    {
        $admin = auth('admin')->user();
        return view('admin.admins.profile', compact('admin'));
    }

    /**
     * Mengupdate data profil admin.
     */
    public function updateProfile(Request $request)
    {
        $admin = auth('admin')->user();

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('nama')) {
            $admin->nama = $request->nama;
        }

        if ($request->filled('nip')) {
            $admin->nip = $request->nip;
        }

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $admin->avatar = $path;
        }
        
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}