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
    <title>Galeri KWT</title>
</head>

<body>

    @include('admin.superadmin.sidebar')
    <div class="content">
        @include('admin.superadmin.navbar')
        <main>
            <!-- Isi Disini -->
            <div x-data="{ isModalOpen: false }" class="p-4 sm:p-6 lg:p-8">

                <div class="header mb-8 flex justify-between items-center">
                    <div class="left">
                        <h1 class="text-3xl font-bold text-gray-800">Galeri KWT</h1>
                    </div>
                    <div class="right">
                        <button @click="isModalOpen = true" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                            <i class='bx bx-plus text-lg mr-1'></i>
                            Tambah Gambar
                        </button>
                    </div>
                </div>

                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Error!</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Grid untuk Galeri --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    @forelse ($galleries as $gallery)
                    <div class="relative group aspect-w-1 aspect-h-1">
                        <img src="{{ asset('storage/' . $gallery->gambar) }}" alt="Gambar Galeri KWT" class="w-full h-full object-cover rounded-lg shadow-md">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 rounded-lg flex items-center justify-center">
                            <form action="{{ route('admin.kwt-gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-2 bg-red-600 rounded-full hover:bg-red-700">
                                    <i class='bx bxs-trash text-xl'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-full text-center text-gray-500 py-10">Belum ada gambar di galeri.</p>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $galleries->links() }}
                </div>

                {{-- Modal Pop-up untuk Tambah Gambar --}}
                <div x-show="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;" x-cloak>
                    <div @click="isModalOpen = false" class="fixed inset-0 bg-black bg-opacity-60"></div>
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-md transform transition-all" @click.away="isModalOpen = false">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800">Tambah Gambar Baru</h3>
                            <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-600"><i class='bx bx-x text-2xl'></i></button>
                        </div>
                        <form action="{{ route('admin.kwt-gallery.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                            @csrf
                            <div>
                                <label for="gambar" class="block text-sm font-medium text-gray-700">Pilih File Gambar</label>
                                <input type="file" name="gambar" id="gambar" required class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB.</p>
                            </div>
                            <div class="pt-6 text-right">
                                <button type="button" @click="isModalOpen = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-md mr-2">Batal</button>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End -->
        </main>
    </div>

    <script src="../index.js"></script>
</body>

</html>