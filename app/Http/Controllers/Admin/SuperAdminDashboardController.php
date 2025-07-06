<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan; // <-- Pastikan model Laporan di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // === Data untuk Filter Tahun ===
        $selectedYear = $request->input('year', date('Y')); // Ambil tahun dari request, atau default tahun ini
        $availableYears = Laporan::selectRaw('YEAR(tanggal_laporan) as year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year');

        // === Data untuk Statistik Utama (Insights) ===
        $totalLaporanTahunIni = Laporan::whereYear('tanggal_laporan', $selectedYear)->count();
        $totalLaporanSemua = Laporan::count();
        $totalUserAktif = Laporan::whereYear('tanggal_laporan', $selectedYear)->distinct('user_id')->count('user_id');

        // === Data untuk Grafik Laporan per Bulan ===
        $laporanPerBulan = Laporan::select(
                                DB::raw('MONTH(tanggal_laporan) as month'),
                                DB::raw('COUNT(*) as count')
                            )
                            ->whereYear('tanggal_laporan', $selectedYear)
                            ->groupBy('month')
                            ->orderBy('month', 'asc')
                            ->get()
                            ->keyBy('month'); // Membuat key array berdasarkan bulan

        // Siapkan array untuk 12 bulan, default nilainya 0
        $chartData = array_fill(1, 12, 0);
        foreach ($laporanPerBulan as $month => $data) {
            $chartData[$month] = $data->count;
        }

        // === Data untuk Tabel Laporan Terbaru ===
        $laporanTerbaru = Laporan::with('user')->latest()->take(5)->get();

        // Kirim semua data ke view
        return view('admin.superadmin.dashboard', [
            'adminName'       => auth('admin')->user()->nama,
            'selectedYear'    => $selectedYear,
            'availableYears'  => $availableYears,
            'totalLaporanTahunIni' => $totalLaporanTahunIni,
            'totalLaporanSemua'  => $totalLaporanSemua,
            'totalUserAktif'  => $totalUserAktif,
            'chartLabels'     => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            'chartData'       => array_values($chartData), // Kirim sebagai array biasa
            'laporanTerbaru'  => $laporanTerbaru,
        ]);
    }
}