<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     */
    public function dashboard()
    {
        // Logika untuk mengambil data dashboard bisa ditambahkan di sini
        return view('admin.admins.dashboard');
    }

    /**
     * Menampilkan halaman data laporan.
     */
    public function laporan()
    {
        // Logika untuk mengambil data laporan bisa ditambahkan di sini
        return view('admin.admins.laporan');
    }
    
}