<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <title>Harga Pangan</title>
</head>

<body>

    @include('admin.superadmin.sidebar')
    <div class="content">
        @include('admin.superadmin.navbar')
        <main>
            <!-- Isi Disini -->
            <div class="flex flex-col md:flex-row">

                <main class="flex-1">
                    <div class="header">
                        <div class="left">
                            <h1>Harga Pangan</h1>
                        </div>
                    </div>

                    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
                        <div class="md:flex md:items-center md:justify-end mb-6">
                            <div class="mt-4 flex md:mt-0">
                                <button type="button" id="open-add-modal-btn" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <i class='bx bx-plus text-lg mr-1'></i>
                                    Tambah Harga
                                </button>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                            <p class="font-bold">Sukses!</p>
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pangan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($semua_harga as $key => $harga)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $harga->nama_pangan }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp {{ number_format($harga->harga_pangan, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                                                <button type="button"
                                                    class="edit-btn text-yellow-500 hover:text-yellow-700 transition-colors"
                                                    data-id="{{ $harga->id }}"
                                                    data-nama="{{ $harga->nama_pangan }}"
                                                    data-harga="{{ $harga->harga_pangan }}">
                                                    <i class='bx bxs-edit text-xl'></i>
                                                </button>
                                                <form action="{{ route('admin.harga-pangan.destroy', $harga->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                                        <i class='bx bxs-trash text-xl'></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                                Belum ada data harga pangan yang ditambahkan.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            <div id="add-modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <form action="{{ route('admin.harga-pangan.store') }}" method="POST">
                                @csrf
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <i class='bx bx-plus text-2xl text-indigo-600'></i>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Tambah Harga Pangan Baru</h3>
                                            <div class="mt-4 space-y-4">
                                                <div>
                                                    <label for="nama_pangan" class="block text-sm font-medium leading-6 text-gray-900">Nama Pangan</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="nama_pangan" id="nama_pangan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="cth: Daging Sapi" required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="harga_pangan" class="block text-sm font-medium leading-6 text-gray-900">Harga (Rp)</label>
                                                    <div class="mt-2">
                                                        <input type="number" name="harga_pangan" id="harga_pangan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="cth: 50000" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">Simpan</button>
                                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto close-modal-btn">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="edit-modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <form id="edit-form" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <i class='bx bxs-edit text-2xl text-yellow-600'></i>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Edit Harga Pangan</h3>
                                            <div class="mt-4 space-y-4">
                                                <div>
                                                    <label for="edit-nama-pangan" class="block text-sm font-medium leading-6 text-gray-900">Nama Pangan</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="nama_pangan" id="edit-nama-pangan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="edit-harga-pangan" class="block text-sm font-medium leading-6 text-gray-900">Harga (Rp)</label>
                                                    <div class="mt-2">
                                                        <input type="number" name="harga_pangan" id="edit-harga-pangan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 sm:ml-3 sm:w-auto">Update</button>
                                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto close-modal-btn">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // === Elemen-elemen Modal ===
                    const addModal = document.getElementById('add-modal');
                    const editModal = document.getElementById('edit-modal');
                    const openAddModalBtn = document.getElementById('open-add-modal-btn');
                    const editBtns = document.querySelectorAll('.edit-btn');
                    const closeModalBtns = document.querySelectorAll('.close-modal-btn');
                    const editForm = document.getElementById('edit-form');
                    const editNamaInput = document.getElementById('edit-nama-pangan');
                    const editHargaInput = document.getElementById('edit-harga-pangan');

                    // === Fungsi untuk membuka & menutup modal ===
                    function openModal(modal) {
                        if (modal) modal.classList.remove('hidden');
                    }

                    function closeModal(modal) {
                        if (modal) modal.classList.add('hidden');
                    }

                    // === Event Listener untuk Buka Modal Tambah ===
                    if (openAddModalBtn) {
                        openAddModalBtn.addEventListener('click', () => {
                            openModal(addModal);
                        });
                    }

                    // === Event Listener untuk Buka Modal Edit ===
                    editBtns.forEach(button => {
                        button.addEventListener('click', () => {
                            const id = button.dataset.id;
                            const nama = button.dataset.nama;
                            const harga = button.dataset.harga;

                            editNamaInput.value = nama;
                            editHargaInput.value = harga;

                            let urlTemplate = "{{ route('admin.harga-pangan.update', ['harga_pangan' => 'REPLACE_ID']) }}";
                            let newActionUrl = urlTemplate.replace('REPLACE_ID', id);
                            editForm.action = newActionUrl;

                            openModal(editModal);
                        });
                    });

                    // === Event Listener untuk Tombol "Batal" atau "Close" ===
                    closeModalBtns.forEach(button => {
                        button.addEventListener('click', () => {
                            closeModal(button.closest('[role="dialog"]'));
                        });
                    });

                    // === Event Listener untuk Menutup Modal Saat Klik di Luar Konten ===
                    window.addEventListener('click', function(event) {
                        if (event.target == addModal) {
                            closeModal(addModal);
                        }
                        if (event.target == editModal) {
                            closeModal(editModal);
                        }
                    });
                });
            </script>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>