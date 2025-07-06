<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Admin</title>
    {{-- Memuat Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen p-4 sm:p-8">
        <div class="max-w-4xl mx-auto">
            
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white p-6 sm:p-8 rounded-lg shadow-md">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 border-b pb-4">
                    Edit Profil
                </h1>

                {{-- Form harus menggunakan enctype="multipart/form-data" untuk upload file --}}
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama', $admin->nama) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('nama') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                                <input type="text" name="nip" id="nip" value="{{ old('nip', $admin->nip) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('nip') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                                <input type="password" name="password" id="password" placeholder="Kosongkan jika tidak ingin diubah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="md:col-span-1 flex flex-col items-center">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                            <img class="h-32 w-32 rounded-full object-cover mb-4 shadow-md" src="{{ $admin->avatar ? asset('storage/' . $admin->avatar) : asset('images/default-avatar.png') }}" alt="Avatar Saat Ini">
                            
                            <input type="file" name="avatar" id="avatar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="text-xs text-gray-500 mt-1">Maks. 2MB (JPG, PNG, GIF)</p>
                            @error('avatar') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t">
                        <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-md mr-3">
                            Kembali
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>