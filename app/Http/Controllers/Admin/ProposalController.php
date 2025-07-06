<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proposal; // Pastikan Model Proposal di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk menghapus file

class ProposalController extends Controller
{
    /**
     * Menampilkan halaman daftar semua proposal.
     */
    // File: app/Http/Controllers/Admin/ProposalController.php

    public function index()
    {
        // 1. Ambil semua data proposal dari database beserta relasi user-nya
        $proposals = \App\Models\Proposal::with('user')->latest()->get();

        // 2. Kirim data '$proposals' ke view yang lokasinya sudah benar
        //    'admin.admins.proposal' akan mengarah ke -> resources/views/admin/admins/proposal.blade.php
        return view('admin.admins.proposal', compact('proposals'));
    }

    /**
     * Mengubah status keterangan proposal.
     */
    public function updateStatus(Request $request, Proposal $proposal)
    {
        // Validasi input, pastikan status yang dikirim valid.
        $request->validate([
            'keterangan' => 'required|in:diproses,disetujui,ditolak',
        ]);

        // Update status di database.
        $proposal->update(['keterangan' => $request->keterangan]);

        // Redirect kembali dengan notifikasi sukses.
        return back()->with('success', 'Status proposal berhasil diubah!');
    }

    /**
     * Menghapus data proposal.
     */
    public function destroy(Proposal $proposal)
    {
        // Hapus file dari storage jika ada.
        if ($proposal->file) {
            Storage::disk('public')->delete($proposal->file);
        }

        // Hapus data dari database.
        $proposal->delete();

        // Redirect kembali dengan notifikasi sukses.
        return back()->with('success', 'Proposal berhasil dihapus.');
    }
}
