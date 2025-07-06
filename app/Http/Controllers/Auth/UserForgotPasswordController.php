<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User di-import
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserForgotPasswordController extends Controller
{
    /**
     * LANGKAH 1: Menampilkan form untuk memasukkan NIK.
     */
    public function showNikRequestForm()
    {
        return view('auth.forgot.verify-nik');
    }

    /**
     * LANGKAH 1: Memproses verifikasi NIK.
     */
    public function verifyNik(Request $request)
    {
        $request->validate(['nik' => 'required|string|digits:16']);

        $user = User::where('nik', $request->nik)->first();

        if (!$user) {
            return back()->with('error', 'NIK yang Anda masukkan tidak terdaftar.');
        }

        // Jika NIK ditemukan, kita enkripsi ID user untuk dibawa ke langkah selanjutnya.
        // Ini lebih aman daripada mengirim ID asli di URL.
        $encryptedUserId = Crypt::encryptString($user->id);

        return redirect()->route('password.verify.phone.form', ['id' => $encryptedUserId]);
    }

    /**
     * LANGKAH 2: Menampilkan form untuk memasukkan No. HP.
     */
    public function showPhoneRequestForm(Request $request, $encryptedId)
    {
        try {
            // Kita coba dekripsi ID. Jika gagal, berarti URL tidak valid.
            $userId = Crypt::decryptString($encryptedId);
            $user = User::findOrFail($userId);
        } catch (\Exception $e) {
            return redirect()->route('password.verify.nik.form')->with('error', 'Link verifikasi tidak valid.');
        }
        
        // Kirim encryptedId ke view agar bisa digunakan lagi di form selanjutnya
        return view('auth.forgot.verify-phone', ['encryptedId' => $encryptedId]);
    }

    /**
     * LANGKAH 2: Memproses verifikasi No. HP.
     */
    public function verifyPhone(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|string',
            'user_id' => 'required|string', // Hidden input dari form
        ]);

        try {
            $userId = Crypt::decryptString($request->user_id);
            $user = User::findOrFail($userId);
        } catch (\Exception $e) {
             return redirect()->route('password.verify.nik.form')->with('error', 'Link verifikasi tidak valid.');
        }

        // Bandingkan No. HP yang diinput dengan yang ada di database
        if ($request->no_hp != $user->no_hp) {
            return redirect()->route('password.verify.nik.form')->with('error', 'Verifikasi gagal. Silakan ulangi dari awal.');
        }

        // Jika berhasil, simpan ID di session untuk tahap akhir (reset password)
        $request->session()->put('password_reset_user_id', $user->id);

        return redirect()->route('password.reset.form');
    }

    /**
     * LANGKAH 3: Menampilkan form untuk reset password baru.
     */
    public function showResetForm(Request $request)
    {
        // Hanya user yang sudah melewati 2 tahap verifikasi yang boleh ke sini
        if (!$request->session()->has('password_reset_user_id')) {
            return redirect()->route('password.verify.nik.form')->with('error', 'Harap selesaikan verifikasi terlebih dahulu.');
        }
        return view('auth.forgot.reset-password');
    }

    /**
     * LANGKAH 3: Memproses penyimpanan password baru.
     */
    public function resetPassword(Request $request)
    {
        if (!$request->session()->has('password_reset_user_id')) {
            return redirect()->route('password.verify.nik.form')->with('error', 'Sesi Anda telah habis. Harap ulangi proses verifikasi.');
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $userId = $request->session()->get('password_reset_user_id');
        $user = User::find($userId);
        
        if (!$user) {
            return redirect()->route('password.verify.nik.form')->with('error', 'Terjadi kesalahan, akun tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus session setelah password berhasil direset
        $request->session()->forget('password_reset_user_id');

        return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }
}