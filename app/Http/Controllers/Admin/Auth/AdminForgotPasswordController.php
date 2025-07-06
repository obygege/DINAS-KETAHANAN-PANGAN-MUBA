<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin; // Pastikan model Admin di-import
use Illuminate\Support\Facades\Hash;

class AdminForgotPasswordController extends Controller
{
    /**
     * Menampilkan halaman form untuk memasukkan NIP.
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Memvalidasi NIP dan menyimpan ID admin di session jika valid.
     */
    public function findAccountByNip(Request $request)
    {
        $request->validate(['nip' => 'required|string']);

        $admin = Admin::where('nip', $request->nip)->first();

        if (!$admin) {
            // Jika NIP tidak ditemukan, kembali dengan pesan error.
            return back()->withErrors(['nip' => 'NIP yang Anda masukkan tidak terdaftar.']);
        }

        // Jika NIP ditemukan, simpan ID admin di session untuk langkah selanjutnya.
        // Ini untuk memastikan hanya user yang lolos tahap ini yang bisa ke halaman reset.
        $request->session()->put('admin_password_reset_id', $admin->id);

        return redirect()->route('admin.password.reset.form');
    }

    /**
     * Menampilkan form untuk mereset password baru.
     */
    public function showResetForm(Request $request)
    {
        // Cek apakah session untuk reset ada. Jika tidak, tendang kembali.
        if (!$request->session()->has('admin_password_reset_id')) {
            return redirect()->route('admin.password.request')->with('error', 'Silakan masukkan NIP Anda terlebih dahulu.');
        }

        return view('admin.auth.reset-password');
    }

    /**
     * Memproses reset password baru.
     */
    public function resetPassword(Request $request)
    {
        if (!$request->session()->has('admin_password_reset_id')) {
            return redirect()->route('admin.password.request')->with('error', 'Sesi reset password telah habis. Silakan ulangi lagi.');
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil ID admin dari session
        $adminId = $request->session()->get('admin_password_reset_id');
        $admin = Admin::find($adminId);

        if (!$admin) {
             return redirect()->route('admin.password.request')->with('error', 'Terjadi kesalahan. Akun tidak ditemukan.');
        }

        // Update password
        $admin->password = Hash::make($request->password);
        $admin->save();

        // Hapus session setelah berhasil di-reset
        $request->session()->forget('admin_password_reset_id');

        return redirect()->route('admin.login.form')->with('success', 'Password Anda telah berhasil direset. Silakan login dengan password baru.');
    }
}