<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#00A70B] flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg mx-auto">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Pendaftaran Admin Baru</h2>
            <p class="text-gray-500 mt-2">Buat akun untuk administrator sistem.</p>
        </div>

        {{-- Form ini akan kita hubungkan ke AdminRegisterController nanti --}}
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama admin" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B] @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" required>
                @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="nip" class="block text-gray-700 text-sm font-semibold mb-2">NIP (Nomor Induk Pegawai)</label>
                <input type="text" id="nip" name="nip" placeholder="Masukkan 16-20 digit NIP" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B] @error('nip') border-red-500 @enderror" value="{{ old('nip') }}" required>
                @error('nip')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password yang kuat" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B] @error('password') border-red-500 @enderror" required>
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-semibold mb-2">Role</label>
                <select id="role" name="role" class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-[#00A70B]">
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="avatar" class="block text-gray-700 text-sm font-semibold mb-2">Avatar (Opsional)</label>
                <input type="file" id="avatar" name="avatar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-[#00A70B] file:text-white file:border-none file:px-4 file:py-2 file:mr-4 file:cursor-pointer">
                @error('avatar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="w-full bg-[#00A70B] text-white font-bold py-3 px-4 rounded-lg hover:bg-[#008f0a] transition duration-300">
                    Daftarkan Admin
                </button>
            </div>
        </form>

        <!-- ======================================= -->
        <!-- == BAGIAN INI YANG SAYA TAMBAHKAN ====== -->
        <!-- ======================================= -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                {{-- Ini adalah link yang benar ke halaman login admin --}}
                <a href="{{ route('admin.index') }}" class="font-semibold text-[#00A70B] hover:underline">
                    Login sekarang
                </a>
            </p>
        </div>

    </div>

</body>

</html>