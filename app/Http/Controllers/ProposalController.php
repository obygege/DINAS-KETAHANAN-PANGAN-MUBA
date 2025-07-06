<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    /**
     * Menampilkan form ATAU status proposal yang sudah ada.
     */
    public function create()
    {
        // Cek apakah user yang sedang login sudah pernah mengirim proposal
        $existingProposal = Proposal::where('user_id', Auth::id())->first();

        // Kirim data proposal (atau null jika belum ada) ke view yang sama
        return view('main.proposal', ['proposal' => $existingProposal]);
    }

    /**
     * Menyimpan proposal baru ke database.
     * Method store ini tidak perlu diubah.
     */
    // File: app/Http/Controllers/ProposalController.php

    public function store(Request $request)
    {
        // Cek lagi untuk memastikan user tidak bisa submit 2x
        if (\App\Models\Proposal::where('user_id', \Illuminate\Support\Facades\Auth::id())->exists()) {
            return redirect()->route('proposal.create')->with('error', 'Anda sudah pernah mengajukan proposal.');
        }

        $validatedData = $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'alamat' => 'required|string',
            'ketua_kelompok' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('proposals', 'public');
            $validatedData['file'] = $filePath;
        }

        // =================================================================
        // == PASTIKAN BARIS INI ADA SEBELUM `Proposal::create()` ========
        // =================================================================
        $validatedData['user_id'] = \Illuminate\Support\Facades\Auth::id();

        \App\Models\Proposal::create($validatedData);

        return redirect()->route('proposal.create')
            ->with('success', 'Proposal berhasil dikirim dan sedang diproses!');
    }
}
