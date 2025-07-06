<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <title>Laporan Kegiatan</title>
</head>

<body>

    @include('admin.admins.sidebar')
    <div class="content">
        @include('admin.admins.navbar')
        <main>
            <!-- Isi Disini -->
            <div class="header">
                <div class="left">
                    <h1>Laporan Kegiatan</h1>
                </div>
            </div>

            <div class="container mx-auto p-4 sm:p-6 lg:p-8">
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                {{-- ... bagian atas file ... --}}
                <div class="container mx-auto p-4 sm:p-6 lg:p-8">

                    <div class="mb-6">
                        <h3 class="text-md font-semibold text-gray-600 mb-2">Filter Berdasarkan Tahun:</h3>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.laporan.index') }}"
                                class="px-4 py-2 text-sm font-medium rounded-md transition-colors
                      {{ !$selected_year ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                Semua
                            </a>
                            @foreach ($available_years as $year)
                            <a href="{{ route('admin.laporan.index', ['year' => $year]) }}"
                                class="px-4 py-2 text-sm font-medium rounded-md transition-colors
                          {{ $selected_year == $year ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                {{ $year }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- ... sisa file ... --}}

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pengirim</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelompok</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ketua Kelompok</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kegiatan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Laporan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($laporans as $laporan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->user->nama ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->nama_kelompok }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $laporan->ketua_kelompok }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $laporan->jenis_kegiatan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($laporan->tanggal_laporan)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ asset('storage/' . $laporan->file) }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                            <i class='bx bxs-file-pdf text-lg mr-1'></i>
                                            <span>Lihat File</span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
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
                                    <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                                        Belum ada laporan yang masuk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>