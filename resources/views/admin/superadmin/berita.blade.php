<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <title>Manajemen Berita</title>
    <style>
        /* Menambahkan style untuk aspect-ratio jika tidak didukung oleh semua browser via CDN */
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        .aspect-video {
            aspect-ratio: 16 / 9;
        }
    </style>
</head>

<body>

    @include('admin.superadmin.sidebar')
    <div class="content">
        @include('admin.superadmin.navbar')
        <main>
            <!-- Isi Disini -->
            <main class="flex-1">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Manajemen Berita</h1>
                    </div>

                <div class="container mx-auto p-4 sm:p-6 lg:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <p class="text-gray-600">Kelola semua berita yang akan ditampilkan di halaman depan.</p>
                        <button type="button" id="open-add-modal-btn" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                            <i class='bx bx-plus text-lg mr-1'></i> Tambah Berita Baru
                        </button>
                    </div>

                    @if ($message = Session::get('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Publikasi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Gambar</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($semua_berita as $key => $berita)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900 max-w-sm">{{ $berita->judul }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $berita->created_at->translatedFormat('d M Y') }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                                <i class='bx bxs-image-alt text-lg mr-1'></i>
                                                <span>Lihat Gambar</span>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center items-center space-x-4">
                                                <button type="button" class="edit-btn text-yellow-500 hover:text-yellow-700 transition-colors" title="Edit"
                                                    data-id="{{ $berita->id }}"
                                                    data-judul="{{ $berita->judul }}"
                                                    data-konten="{{ $berita->konten }}"
                                                    data-gambar="{{ asset('storage/' . $berita->gambar) }}">
                                                    <i class='bx bxs-edit text-2xl'></i>
                                                </button>
                                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors" title="Hapus">
                                                        <i class='bx bxs-trash text-2xl'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <i class='bx bx-news text-6xl text-gray-300'></i>
                                                <p class="mt-2">Belum ada berita yang ditambahkan.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <div id="add-modal" class="relative z-50 hidden">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl w-full max-w-2xl">
                            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6">
                                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Tambah Berita Baru</h3>
                                    <div class="mt-4 space-y-4">
                                        <div><label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label><input type="text" name="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></div>
                                        <div><label for="konten" class="block text-sm font-medium text-gray-700">Isi Berita</label><textarea name="konten" rows="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea></div>
                                        <div><label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Sampul</label><input type="file" name="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required></div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"><button type="submit" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 sm:ml-3 sm:w-auto">Simpan</button><button type="button" class="close-modal-btn mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit-modal" class="relative z-50 hidden">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl w-full max-w-2xl">
                            <form id="edit-form" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6">
                                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Edit Berita</h3>
                                    <div class="mt-4 space-y-4">
                                        <div><label for="edit-judul" class="block text-sm font-medium text-gray-700">Judul Berita</label><input type="text" name="judul" id="edit-judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></div>
                                        <div><label for="edit-konten" class="block text-sm font-medium text-gray-700">Isi Berita</label><textarea name="konten" id="edit-konten" rows="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea></div>
                                        <div><label class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label><img id="edit-gambar-preview" src="" alt="Gambar Saat Ini" class="mt-2 w-48 h-32 object-cover rounded-md mb-2 border"><input type="file" name="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"></div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"><button type="submit" class="inline-flex w-full justify-center rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 sm:ml-3 sm:w-auto">Update</button><button type="button" class="close-modal-btn mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // --- Logika untuk Modal Tambah & Edit (Tetap Sama) ---
                    const addModal = document.getElementById('add-modal');
                    const editModal = document.getElementById('edit-modal');
                    const openAddModalBtn = document.getElementById('open-add-modal-btn');
                    const editBtns = document.querySelectorAll('.edit-btn');
                    const closeModalBtns = document.querySelectorAll('.close-modal-btn');

                    if (openAddModalBtn) {
                        openAddModalBtn.addEventListener('click', () => addModal.classList.remove('hidden'));
                    }

                    editBtns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            const id = btn.dataset.id;
                            const judul = btn.dataset.judul;
                            const konten = btn.dataset.konten;
                            const gambar = btn.dataset.gambar;

                            const form = document.getElementById('edit-form');
                            form.action = `/admin/berita/${id}`;
                            document.getElementById('edit-judul').value = judul;
                            document.getElementById('edit-konten').value = konten;
                            document.getElementById('edit-gambar-preview').src = gambar;

                            editModal.classList.remove('hidden');
                        });
                    });

                    // --- Logika Menutup Modal Tambah & Edit ---
                    closeModalBtns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            if (addModal) addModal.classList.add('hidden');
                            if (editModal) editModal.classList.add('hidden');
                        });
                    });

                    // !!! Logika untuk Preview Modal (DIHAPUS KARENA TIDAK DIPAKAI LAGI) !!!

                });
            </script>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>