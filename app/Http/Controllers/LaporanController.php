<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LaporanController extends Controller
{
    /**
     * Menampilkan daftar laporan kegiatan milik pengguna yang sedang login.
     */
    public function index(): View
    {
        // Mengambil data laporan melalui relasi dari user yang sedang login.
        // Ini lebih elegan dan 'best practice' daripada query manual.
        $laporans = Auth::user()->laporans()
            ->latest()
            ->paginate(10);

        // Menggunakan compact() untuk cara yang lebih singkat mengirim data ke view.
        return view('main.laporan', compact('laporans'));
    }
    

    /**
     * Menyimpan laporan baru yang dikirim dari form.
     */
    public function store(Request $request): RedirectResponse
    {
        // Ambil data yang sudah tervalidasi sebagai array.
        $validatedData = $request->validate([
            'jenis_kegiatan'  => 'required|string|max:255',
            'nama_kelompok'   => 'required|string|max:255',
            'ketua_kelompok'  => 'required|string|max:255',
            'tanggal_laporan' => 'required|date',
            'file'            => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:5120',
        ]);

        // Tambahkan user_id dan path file ke dalam array data.
        $validatedData['user_id'] = Auth::id();
        $validatedData['file'] = $request->file('file')->store('laporan_files', 'public');

        // Buat record baru dari array data.
        Laporan::create($validatedData);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit laporan.
     */
    public function edit(Laporan $laporan): View
    {
        // Cek kepemilikan menggunakan private method.
        $this->checkOwnership($laporan);

        return view('main.edit_laporan', compact('laporan'));
    }

    /**
     * Memperbarui data laporan di database.
     */
    public function update(Request $request, Laporan $laporan): RedirectResponse
    {
        // Cek kepemilikan menggunakan private method.
        $this->checkOwnership($laporan);

        $validatedData = $request->validate([
            'jenis_kegiatan'  => 'required|string|max:255',
            'nama_kelompok'   => 'required|string|max:255',
            'ketua_kelompok'  => 'required|string|max:255',
            'tanggal_laporan' => 'required|date',
            'file'            => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:5120',
        ]);

        // Jika ada file baru yang diupload, proses filenya.
        if ($request->hasFile('file')) {
            Storage::delete('public/' . $laporan->file);
            $validatedData['file'] = $request->file('file')->store('laporan_files', 'public');
        }

        // Update record dengan data yang sudah divalidasi dan diproses.
        $laporan->update($validatedData);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Menghapus data laporan dari database.
     */
    public function destroy(Laporan $laporan): RedirectResponse
    {
        // Cek kepemilikan menggunakan private method.
        $this->checkOwnership($laporan);

        Storage::delete('public/' . $laporan->file);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    /**
     * Private method untuk memeriksa kepemilikan laporan.
     * Mencegah duplikasi kode otorisasi.
     */
    private function checkOwnership(Laporan $laporan): void
    {
        if (Auth::id() !== $laporan->user_id) {
            abort(403, 'AKSES DITOLAK');
        }
    }
}