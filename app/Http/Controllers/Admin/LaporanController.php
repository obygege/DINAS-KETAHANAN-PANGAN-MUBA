<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $available_years = Laporan::select(DB::raw('YEAR(tanggal_laporan) as report_year'))
            ->distinct()
            ->orderBy('report_year', 'desc')
            ->pluck('report_year');

        $query = Laporan::with('user');

        $selected_year = $request->input('year');

        if ($selected_year) {
            $query->whereYear('tanggal_laporan', $selected_year);
        }

        $laporans = $query->orderBy('tanggal_laporan', 'desc')->get();

        $viewData = [
            'laporans' => $laporans,
            'available_years' => $available_years,
            'selected_year' => $selected_year,
        ];

        // --- INI BAGIAN YANG DIPERBARUI ---
        // Cek role user yang sedang login
        if (auth()->guard('admin')->user()->role == 'superadmin') {
            // Jika superadmin, tampilkan view dari folder superadmin
            return view('admin.superadmin.laporan', $viewData);
        }
        
        // Jika bukan, tampilkan view admin biasa
        return view('admin.admins.laporan', $viewData);
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->file) {
            Storage::disk('public')->delete($laporan->file);
        }
        $laporan->delete();
        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}