<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assetss/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>

<body>

    <div class="top-container">
        @include('main.navbar')

        <div class="status">
            <!-- Preview Proposal -->

            <!-- End -->
        </div>
    </div>


    <div class="bottom-container">

        <!-- Card -->
        <div class="prog-status" style="width: 500%;">
            <div class="header">
                <!-- Code Disini -->
                <div class="w-full px-4 sm:px-6 lg:px-8">

                    {{-- LOGIKA UTAMA: Cek apakah variabel $proposal ada isinya (tidak null) --}}
                    @if ($proposal)

                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-gray-800">Status Pengajuan Anda</h2>
                        <p class="text-gray-500 mt-2">Jika status proposal anda disetujui kami mohon untuk menunggu, <br> nanti kami akan menghubungi anda melalui no telp yang anda masukkan</p>

                        <div class="text-left mt-8 border-t pt-6 space-y-4">
                            <div>
                                <strong class="text-gray-600">Nama Kelompok:</strong>
                                <p class="text-gray-800 text-lg">{{ $proposal->nama_kelompok }}</p>
                            </div>
                            <div>
                                <strong class="text-gray-600">Tanggal Pengajuan:</strong>
                                <p class="text-gray-800">{{ $proposal->created_at->format('d F Y, H:i') }} WIB</p>
                            </div>
                            <div>
                                <strong class="text-gray-600">File Terkirim:</strong>
                                <a href="{{ asset('storage/' . $proposal->file) }}" target="_blank" class="text-blue-500 hover:underline font-semibold flex items-center w-max">
                                    <i class='bx bxs-file-pdf text-xl mr-1'></i>
                                    <span>Lihat File Proposal</span>
                                </a>
                            </div>
                            <div>
                                <strong class="text-gray-600">Status Saat Ini:</strong>
                                <div class="mt-1">
                                    @if($proposal->keterangan == 'disetujui')
                                    <span class="text-sm font-bold py-1 px-3 rounded-full bg-green-100 text-green-800">Disetujui</span>
                                    @elseif($proposal->keterangan == 'ditolak')
                                    <span class="text-sm font-bold py-1 px-3 rounded-full bg-red-100 text-red-800">Ditolak</span>
                                    @else
                                    <span class="text-sm font-bold py-1 px-3 rounded-full bg-yellow-100 text-yellow-800">Diproses</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    {{-- ====================================================== --}}
                    {{-- == JIKA BELUM PUNYA, TAMPILKAN FORM =================== --}}
                    {{-- ====================================================== --}}
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Form Pengajuan Proposal</h2>
                        <p class="text-gray-500 mt-2">Lengkapi data untuk mengajukan proposal baru.</p>
                    </div>

                    @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                    @endif
                    @if(session('info'))
                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
                        <p>{{ session('info') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Kelompok</label>
                                <input type="text" id="nama_kelompok" name="nama_kelompok" value="{{ old('nama_kelompok') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('nama_kelompok') border-red-500 @enderror">
                                @error('nama_kelompok')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="ketua_kelompok" class="block text-gray-700 text-sm font-semibold mb-2">Nama Ketua Kelompok</label>
                                <input type="text" id="ketua_kelompok" name="ketua_kelompok" value="{{ old('ketua_kelompok') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('ketua_kelompok') border-red-500 @enderror">
                                @error('ketua_kelompok')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="alamat" class="block text-gray-700 text-sm font-semibold mb-2">Alamat Lengkap Kelompok</p>
                                <textarea id="alamat" name="alamat" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-4">
                            <label for="file" class="block text-gray-700 text-sm font-semibold mb-2">Upload File Proposal (PDF, maks 2MB)</label>
                            <input type="file" id="file" name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none @error('file') border-red-500 @enderror file:bg-green-600 file:text-white file:border-none file:px-4 file:py-2 file:mr-4 file:cursor-pointer">
                            @error('file')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                                Kirim Proposal
                            </button>
                        </div>
                    </form>
                    @endif

                </div>
                <!-- End -->
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="assetss/script.js"></script>

</body>

</html>