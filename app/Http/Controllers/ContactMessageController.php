<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import model

class ContactMessageController extends Controller
{
    /**
     * Menyimpan pesan baru dari form kontak.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // 2. Simpan data ke database
        ContactMessage::create($request->all());

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success_contact', 'Pesan Anda telah berhasil terkirim. Terima kasih!');
    }
}