<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#00A70B] flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Admin Login</h2>
            <p class="text-gray-500 mt-2">Masukkan NIP dan password Anda.</p>
        </div>

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nip" class="block text-gray-700 text-sm font-semibold mb-2">NIP</label>
                <input type="text" id="nip" name="nip" value="{{ old('nip') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B]" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A70B]" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="w-full bg-[#00A70B] text-white font-bold py-3 px-4 rounded-lg hover:bg-[#008f0a] transition duration-300">Login</button>
            </div>
        </form>

        <div class="text-right mt-4">
            <a href="{{ route('admin.password.request') }}" class="text-sm text-gray-600 hover:text-[#00A70B] hover:underline">
                Lupa Password?
            </a>
        </div>

    </div>
</body>

</html>