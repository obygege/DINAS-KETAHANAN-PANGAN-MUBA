<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage; // <-- Pastikan Model ini sudah ada dari fitur sebelumnya
use Illuminate\Http\Request;

class ContactMessageViewController extends Controller
{
    /**
     * Menampilkan daftar semua pesan kontak yang masuk.
     */
    public function index()
    {
        // Ambil semua pesan, urutkan dari yang terbaru (latest),
        // dan gunakan paginasi untuk menampilkan 15 pesan per halaman.
        $messages = ContactMessage::latest()->paginate(15);

        // Arahkan ke view sesuai lokasi file yang kamu sebutkan
        return view('admin.superadmin.kotak-saran', compact('messages'));
    }
}