<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#00A70B] flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Cari Akun Anda</h2>
            <p class="text-gray-500 mt-2">Masukkan NIP untuk verifikasi akun.</p>
        </div>

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <form action="{{ route('admin.password.find') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nip" class="block text-gray-700 text-sm font-semibold mb-2">NIP</label>
                <input type="text" id="nip" name="nip" value="{{ old('nip') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B]" required>
                @error('nip')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-grid mt-6">
                <button type="submit" class="w-full bg-[#00A70B] text-white font-bold py-3 px-4 rounded-lg hover:bg-[#008f0a] transition duration-300">Cari Akun</button>
            </div>
        </form>
         <div class="text-center mt-6">
            <a href="{{ route('admin.login.form') }}" class="text-sm text-gray-600 hover:text-[#00A70B] hover:underline">
                &larr; Kembali ke Login
            </a>
        </div>
    </div>
</body>
</html>