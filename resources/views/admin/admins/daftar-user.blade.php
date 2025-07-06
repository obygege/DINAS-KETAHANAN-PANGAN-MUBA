<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Daftar Pengguna</title>
</head>

<body>

    @include('admin.admins.sidebar')
    <div class="content">
        @include('admin.admins.navbar')
        <main>
            <!-- Isi Disini -->
            <div x-data="{ isModalOpen: false, editUser: null }" class="p-4 sm:p-6 lg:p-8">

                <div class="header mb-8">
                    <div class="left">
                        <h1 class="text-3xl font-bold text-gray-800">Daftar Akun Kelompok Tani</h1>
                        {{-- Breadcrumb bisa ditambahkan di sini jika perlu --}}
                    </div>
                </div>

                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                {{-- Tabel Daftar User --}}
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. HP</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $key => $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $users->firstItem() + $key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}" alt="Avatar">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $user->nama }}</div>
                                                <div class="text-xs text-gray-500">Bergabung: {{ $user->created_at->format('d M Y') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->nik }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->no_hp }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex items-center justify-center space-x-4">
                                            {{-- Tombol Edit ini akan membuka modal --}}
                                            <button @click="isModalOpen = true; editUser = {{ json_encode($user) }}" class="text-gray-400 hover:text-blue-600 transition-colors" title="Edit">
                                                <i class='bx bxs-edit text-xl'></i>
                                            </button>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors" title="Hapus">
                                                    <i class='bx bxs-trash text-xl'></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada pengguna yang terdaftar.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-gray-50 border-t">{{ $users->links() }}</div>
                </div>

                {{-- MODAL POP-UP EDIT PENGGUNA --}}
                {{-- [PERUBAHAN DI SINI] ditambahkan style="display: none;" --}}
                <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;" x-cloak>
                    <div @click="isModalOpen = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

                    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl transform transition-all" @click.away="isModalOpen = false">

                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800">Edit Pengguna: <span x-text="editUser ? editUser.nama : ''"></span></h3>
                            <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-600">
                                <i class='bx bx-x text-2xl'></i>
                            </button>
                        </div>

                        <template x-if="editUser">
                            <form :action="`/admin/users/${editUser.id}`" method="POST" class="p-6">
                                @csrf
                                @method('PUT')
                                <div class="space-y-4">
                                    <div>
                                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" x-model="editUser.nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                        <input type="text" name="nik" id="nik" x-model="editUser.nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No. HP</label>
                                        <input type="text" name="no_hp" id="no_hp" x-model="editUser.no_hp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div class="border-t pt-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru (Opsional)</label>
                                        <input type="password" name="password" id="password" placeholder="Kosongkan jika tidak diubah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mt-4">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-6 -m-6 rounded-b-lg">
                                    <button type="button" @click="isModalOpen = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-md mr-2">Batal</button>
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Simpan Perubahan</button>
                                </div>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>