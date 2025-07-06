<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Proposal; // Pastikan model Proposal sudah ada

class AdminDashboardController extends Controller
{
    public function index()
    {
        // === Ambil data yang dibutuhkan saja ===
        $totalLaporanSemua = Laporan::count();
        $totalProposalSemua = Proposal::count();

        // Kirim data ke view
        return view('admin.admins.dashboard', [
            'adminName'          => auth('admin')->user()->nama,
            'totalLaporanSemua'  => $totalLaporanSemua,
            'totalProposalSemua' => $totalProposalSemua,
        ]);
    }
}