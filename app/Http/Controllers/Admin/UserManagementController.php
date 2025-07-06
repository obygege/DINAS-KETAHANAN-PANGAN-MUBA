<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.admins.daftar-user', compact('users'));
    }

    /**
     * TIDAK DIPERLUKAN LAGI
     * public function edit(User $user) { ... }
     */

    /**
     * Memproses update data pengguna dari form modal.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => ['required', 'string', 'digits:16', Rule::unique('users')->ignore($user->id)],
            'no_hp' => ['required', 'string', 'max:15', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->no_hp = $request->no_hp;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus data pengguna.
     */
    public function destroy(User $user)
    {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}