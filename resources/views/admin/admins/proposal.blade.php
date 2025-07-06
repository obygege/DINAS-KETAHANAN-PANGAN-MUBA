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
    <title>Proposal</title>
</head>

<body>

    <!-- Sidebar -->
    @include('admin.admins.sidebar')
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        @include('admin.admins.navbar')
        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Proposal B2SA</h1>
                </div>
            </div>

            <!-- Isi Disini -->
            <div class="container mx-auto p-4 sm:p-6 lg:p-8">
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($proposals as $proposal)
                    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col justify-between">
                        <div>
                            <!-- Header Kartu (Sudah ditambahkan No HP) -->
                            <div class="border-b pb-4 mb-4">
                                <h3 class="text-lg font-bold text-gray-800">{{ $proposal->nama_kelompok }}</h3>
                                <p class="text-xs text-gray-500">Diajukan oleh: {{ $proposal->user->nama ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class='bx bxs-phone text-base mr-1'></i>
                                    <span>{{ $proposal->user->no_hp ?? 'N/A' }}</span>
                                </p>
                                <p class="text-xs text-gray-500 mt-2">Pada: {{ $proposal->created_at->format('d M Y') }}</p>
                            </div>

                            <!-- Isi Kartu -->
                            <div class="text-sm space-y-2">
                                <p><strong class="text-gray-600">Ketua:</strong> {{ $proposal->ketua_kelompok }}</p>
                                <a href="{{ asset('storage/' . $proposal->file) }}" target="_blank" class="text-blue-600 hover:underline font-semibold flex items-center w-max">
                                    <i class='bx bxs-file-pdf text-lg mr-1'></i>
                                    <span>Lihat File Proposal</span>
                                </a>
                            </div>
                        </div>

                        <!-- Footer Kartu (Aksi & Status) -->
                        <div class="mt-6 pt-4 border-t flex justify-between items-center">
                            <!-- Dropdown Status -->
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <button @click="open = !open" class="font-bold py-1 px-3 rounded-full text-xs
                        @if($proposal->keterangan == 'disetujui') bg-green-100 text-green-800
                        @elseif($proposal->keterangan == 'ditolak') bg-red-100 text-red-800
                        @else bg-yellow-100 text-yellow-800 @endif
                        inline-flex items-center">
                                    <span>{{ ucfirst($proposal->keterangan) }}</span>
                                    <i class='bx bx-chevron-down ml-1'></i>
                                </button>
                                <div x-show="open" @click.away="open = false" x-transition class="origin-bottom-left absolute left-0 bottom-full mb-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                                    <div class="py-1" role="menu">
                                        <form action="{{ route('admin.proposals.updateStatus', $proposal->id) }}" method="POST">
                                            @csrf @method('PATCH') <input type="hidden" name="keterangan" value="diproses">
                                            <button type="submit" class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Diproses</button>
                                        </form>
                                        <form action="{{ route('admin.proposals.updateStatus', $proposal->id) }}" method="POST">
                                            @csrf @method('PATCH') <input type="hidden" name="keterangan" value="disetujui">
                                            <button type="submit" class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Disetujui</button>
                                        </form>
                                        <form action="{{ route('admin.proposals.updateStatus', $proposal->id) }}" method="POST">
                                            @csrf @method('PATCH') <input type="hidden" name="keterangan" value="ditolak">
                                            <button type="submit" class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ditolak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.proposals.destroy', $proposal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proposal ini secara permanen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                    <i class='bx bxs-trash text-xl'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white rounded-xl shadow-md">
                        <p class="text-gray-500">Belum ada proposal yang masuk.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>