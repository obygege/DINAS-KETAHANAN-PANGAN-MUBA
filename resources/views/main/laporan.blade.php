<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assetss/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>

<body>

    <div class="top-container">
        @include('main.navbar')

        <div class="status">
            <!-- Preview Proposal -->

            <!-- End -->
        </div>
    </div>


    <div class="bottom-container">

        <!-- Card -->
        <div class="prog-status" style="width: 500%;">
            <div class="header">
                <!-- Code Disini -->
                <div class="w-full px-4 sm:px-6 lg:px-8 py-8">

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800">Laporan Kegiatan</h2>
                            <p class="text-gray-500 mt-1">Daftar semua laporan kegiatan yang telah dikirim.</p>
                        </div>
                        <div>
                            <button id="openModalBtn" class="bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300 flex items-center shadow-lg">
                                <i class='bx bx-plus text-xl mr-2'></i>
                                <span>Tambah Laporan</span>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kegiatan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelompok</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ketua Kelompok</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Laporan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($laporans as $laporan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration + ($laporans->currentPage() - 1) * $laporans->perPage() }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-semibold">{{ $laporan->jenis_kegiatan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $laporan->nama_kelompok }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $laporan->ketua_kelompok }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($laporan->tanggal_laporan)->format('d F Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ asset('storage/' . $laporan->file) }}" target="_blank" class="text-blue-500 hover:underline font-semibold flex items-center">
                                                <i class='bx bxs-file text-xl mr-1 text-gray-500'></i>
                                                <span>{{ basename($laporan->file) }}</span>
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button type="button"
                                                class="text-indigo-600 hover:text-indigo-900 edit-button"
                                                data-id="{{ $laporan->id }}"
                                                data-jenis_kegiatan="{{ $laporan->jenis_kegiatan }}"
                                                data-nama_kelompok="{{ $laporan->nama_kelompok }}"
                                                data-ketua_kelompok="{{ $laporan->ketua_kelompok }}"
                                                data-tanggal_laporan="{{ $laporan->tanggal_laporan }}"
                                                data-file_url="{{ asset('storage/' . $laporan->file) }}"
                                                data-file_name="{{ basename($laporan->file) }}"
                                                data-update_url="{{ route('laporan.update', $laporan->id) }}">
                                                Ubah
                                            </button>
                                            <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Belum ada data laporan yang dikirim.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-gray-200">
                            {{ $laporans->links() }}
                        </div>
                    </div>
                </div>

                <div id="addReportModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
                    <div class="relative top-10 mx-auto p-8 border w-full max-w-2xl shadow-lg rounded-md bg-white">
                        <div class="flex justify-between items-center border-b pb-3 mb-6">
                            <h3 class="text-2xl font-bold text-gray-800">Form Tambah Laporan Baru</h3>
                            <button id="closeModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops! Terjadi kesalahan.</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="jenis_kegiatan" class="block text-gray-700 text-sm font-semibold mb-2">Jenis Kegiatan</label>
                                    <input type="text" id="jenis_kegiatan" name="jenis_kegiatan" value="{{ old('jenis_kegiatan') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Penyuluhan, Pelatihan, dll." required>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="nama_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Kelompok</label>
                                        <input type="text" id="nama_kelompok" name="nama_kelompok" value="{{ old('nama_kelompok') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                    </div>
                                    <div>
                                        <label for="ketua_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Ketua Kelompok</label>
                                        <input type="text" id="ketua_kelompok" name="ketua_kelompok" value="{{ old('ketua_kelompok') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="tanggal_laporan" class="block text-gray-700 text-sm font-semibold mb-2">Tanggal Laporan</label>
                                    <input type="date" id="tanggal_laporan" name="tanggal_laporan" value="{{ old('tanggal_laporan', date('Y-m-d')) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" required>
                                </div>
                                <div>
                                    <label for="file" class="block text-gray-700 text-sm font-semibold mb-2">Upload File Laporan</label>
                                    <p class="text-xs text-gray-500 mb-2">File yang diizinkan: PDF, Word, Excel, Gambar. (Maks 5MB)</p>
                                    <input type="file" id="file" name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-green-600 file:text-white file:border-none file:px-4 file:py-2 file:mr-4 file:cursor-pointer" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png" required>
                                </div>
                            </div>
                            <div class="mt-8 flex justify-end space-x-4">
                                <button type="button" id="cancelModalBtn" class="py-2 px-6 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-300">Batal</button>
                                <button type="submit" class="py-2 px-6 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition duration-300">Kirim Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="editReportModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
                    <div class="relative top-10 mx-auto p-8 border w-full max-w-2xl shadow-lg rounded-md bg-white">
                        <div class="flex justify-between items-center border-b pb-3 mb-6">
                            <h3 class="text-2xl font-bold text-gray-800">Form Ubah Laporan</h3>
                            <button id="closeEditModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form id="editReportForm" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label for="edit_jenis_kegiatan" class="block text-gray-700 text-sm font-semibold mb-2">Jenis Kegiatan</label>
                                    <input type="text" id="edit_jenis_kegiatan" name="jenis_kegiatan" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="edit_nama_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Kelompok</label>
                                        <input type="text" id="edit_nama_kelompok" name="nama_kelompok" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                    </div>
                                    <div>
                                        <label for="edit_ketua_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Ketua Kelompok</label>
                                        <input type="text" id="edit_ketua_kelompok" name="ketua_kelompok" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="edit_tanggal_laporan" class="block text-gray-700 text-sm font-semibold mb-2">Tanggal Laporan</label>
                                    <input type="date" id="edit_tanggal_laporan" name="tanggal_laporan" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50" required>
                                </div>
                                <div>
                                    <label for="edit_file" class="block text-gray-700 text-sm font-semibold mb-2">Upload File Laporan Baru (Opsional)</label>
                                    <p id="current_file_info" class="text-xs text-gray-500 mb-2"></p>
                                    <p class="text-xs text-gray-500 mb-2">Kosongkan jika tidak ingin mengubah file.</p>
                                    <input type="file" id="edit_file" name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-green-600 file:text-white file:border-none file:px-4 file:py-2 file:mr-4 file:cursor-pointer" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                                </div>
                            </div>
                            <div class="mt-8 flex justify-end space-x-4">
                                <button type="button" id="cancelEditModalBtn" class="py-2 px-6 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-300">Batal</button>
                                <button type="submit" class="py-2 px-6 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition duration-300">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const addModal = document.getElementById('addReportModal');
                        const openAddBtn = document.getElementById('openModalBtn');
                        const closeAddBtn = document.getElementById('closeModalBtn');
                        const cancelAddBtn = document.getElementById('cancelModalBtn');

                        const editModal = document.getElementById('editReportModal');
                        const openEditBtns = document.querySelectorAll('.edit-button');
                        const closeEditBtn = document.getElementById('closeEditModalBtn');
                        const cancelEditBtn = document.getElementById('cancelEditModalBtn');
                        const editForm = document.getElementById('editReportForm');

                        const openModal = (modal) => {
                            if (modal) modal.classList.remove('hidden');
                        };

                        const closeModal = (modal) => {
                            if (modal) modal.classList.add('hidden');
                        };

                        if (openAddBtn) openAddBtn.addEventListener('click', () => openModal(addModal));
                        if (closeAddBtn) closeAddBtn.addEventListener('click', () => closeModal(addModal));
                        if (cancelAddBtn) cancelAddBtn.addEventListener('click', () => closeModal(addModal));

                        openEditBtns.forEach(button => {
                            button.addEventListener('click', () => {
                                const data = button.dataset;

                                editForm.action = data.update_url;
                                document.getElementById('edit_jenis_kegiatan').value = data.jenis_kegiatan;
                                document.getElementById('edit_nama_kelompok').value = data.nama_kelompok;
                                document.getElementById('edit_ketua_kelompok').value = data.ketua_kelompok;
                                document.getElementById('edit_tanggal_laporan').value = data.tanggal_laporan;

                                const currentFileInfo = document.getElementById('current_file_info');
                                currentFileInfo.innerHTML = `File saat ini: <a href="${data.file_url}" target="_blank" class="text-blue-500 hover:underline">${data.file_name}</a>`;

                                openModal(editModal);
                            });
                        });

                        if (closeEditBtn) closeEditBtn.addEventListener('click', () => closeModal(editModal));
                        if (cancelEditBtn) cancelEditBtn.addEventListener('click', () => closeModal(editModal));

                        window.addEventListener('click', (event) => {
                            if (event.target === addModal) closeModal(addModal);
                            if (event.target === editModal) closeModal(editModal);
                        });

                        document.addEventListener('keydown', (event) => {
                            if (event.key === 'Escape') {
                                closeModal(addModal);
                                closeModal(editModal);
                            }
                        });
                    });
                </script>
                <!-- End -->
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="assetss/script.js"></script>

</body>

</html>