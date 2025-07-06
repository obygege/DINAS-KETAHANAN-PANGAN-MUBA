<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#00A70B] flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Reset Password</h2>
            <p class="text-gray-500 mt-2">Masukkan password baru Anda.</p>
        </div>

        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password Baru</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B]" required>
                @error('password')
                     <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B]" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="w-full bg-[#00A70B] text-white font-bold py-3 px-4 rounded-lg hover:bg-[#008f0a] transition duration-300">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>