<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Method untuk menampilkan halaman form login admin.
     */
    public function showLoginForm()
    {
        // Menampilkan view di: resources/views/admin/index.blade.php
        return view('admin.index');
    }

    /**
     * Method untuk memproses data login dari form admin (VERSI SIMPEL).
     */
    public function login(Request $request)
    {
        // 1. Validasi input: NIP dan Password wajib diisi.
        $credentials = $request->validate([
            'nip' => 'required|string',
            'password' => 'required',
        ]);

        // 2. Mencoba login menggunakan "guard" khusus admin.
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil, regenerate session untuk keamanan.
            $request->session()->regenerate();

            // 3. Langsung arahkan ke SATU GERBANG UTAMA setelah login berhasil.
            // Tidak perlu cek role di sini.
            return redirect()->intended(route('admin.dashboard'))
                             ->with('success', 'Login Berhasil!');
        }

        // 4. Jika NIP atau Password salah, kembali ke halaman login.
        return back()->with('error', 'NIP atau Password yang Anda masukkan salah.')
                     ->withInput($request->only('nip'));
    }

    /**
     * Method untuk memproses logout admin.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect kembali ke halaman login admin.
        return redirect('/admin'); 
    }
}