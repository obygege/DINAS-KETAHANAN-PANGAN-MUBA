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
            <div class="header mb-8">
                <div class="left">
                    <h1 class="text-3xl font-bold text-gray-800">Kotak Saran & Masukan</h1>
                    <p class="text-gray-500 mt-1">Semua pesan dan masukan dari pengunjung akan ditampilkan di sini.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isi Pesan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($messages as $key => $message)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 align-top">{{ $messages->firstItem() + $key }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 align-top">
                                    {{ $message->created_at->format('d M Y') }}
                                    <span class="block text-xs">{{ $message->created_at->format('H:i') }} WIB</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap align-top">
                                    <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $message->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-semibold align-top">{{ $message->subject }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 align-top" style="white-space: pre-wrap; word-break: break-word;">{{ $message->message }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    Kotak saran masih kosong.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="p-4 bg-gray-50 border-t">
                    {{ $messages->links() }}
                </div>
            </div>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>