<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assetss/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body>

    <div class="top-container">
        @include('main.navbar')

        <div class="status">
            <div class="p-6 text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800" style="color: white;">Selamat Datang di Dashboard B2SA</h1>
                <p class="text-gray-500 mt-1" style="color: #E3DE61;">Upload Proposal Anda atau Kirim Laporan Kegiatan Anda.</p>
            </div>

        </div>



    </div>


    <div class="bottom-container">

        <div class="prog-status">
            <div class="header">
                <h4>Mengenal Pangan B2SA</h4>
                <div class="tabs">
                    <a href="#" class="active">Info</a>
                </div>
            </div>

            <div class="p-4">
                <p class="text-gray-600 text-sm mb-4">
                    Pangan **Beragam, Bergizi, Seimbang, dan Aman (B2SA)** adalah konsep konsumsi pangan yang tidak hanya bertujuan untuk membuat kenyang, tetapi juga untuk hidup sehat, aktif, dan produktif.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class='bx bx-restaurant text-xl text-green-600 mr-3 mt-1'></i>
                        <div>
                            <h5 class="font-semibold">Beragam</h5>
                            <p class="text-xs text-gray-500">Konsumsi berbagai jenis pangan, mulai dari karbohidrat (nasi, jagung), protein (ikan, telur), hingga sayur dan buah.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bx-dna text-xl text-blue-600 mr-3 mt-1'></i>
                        <div>
                            <h5 class="font-semibold">Bergizi</h5>
                            <p class="text-xs text-gray-500">Pastikan makanan mengandung zat gizi lengkap seperti protein, vitamin, dan mineral sesuai kebutuhan tubuh.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bx-shape-circle text-xl text-yellow-600 mr-3 mt-1'></i>
                        <div>
                            <h5 class="font-semibold">Seimbang</h5>
                            <p class="text-xs text-gray-500">Jumlah porsi setiap jenis pangan harus seimbang, tidak berlebihan pada satu jenis saja.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bx-shield-quarter text-xl text-red-600 mr-3 mt-1'></i>
                        <div>
                            <h5 class="font-semibold">Aman</h5>
                            <p class="text-xs text-gray-500">Pangan harus bebas dari cemaran fisik, kimia, dan biologis yang dapat membahayakan kesehatan.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        {{-- ======================================================= --}}
        {{-- == BAGIAN 2: ALUR & SYARAT PENGAJUAN PROPOSAL ========= --}}
        {{-- ======================================================= --}}
        <div class="popular">
            <div class="header">
                <h4>Alur Pengajuan Bantuan</h4>
                <a href="#">#Proposal</a>
            </div>

            <div class="p-4">
                <p class="text-gray-600 text-sm mb-4">
                    Untuk mendapatkan bantuan, kelompok Anda harus mengikuti alur pengajuan proposal yang telah ditetapkan sebagai berikut:
                </p>
                {{-- Kita gunakan ordered list (<ol>) untuk langkah-langkah --}}
                <ol class="list-decimal list-inside space-y-3 text-sm">
                    <li>
                        <span class="font-semibold">Pendaftaran Akun:</span><br>
                        Pastikan ketua kelompok sudah memiliki akun di sistem ini dengan data yang valid.
                    </li>
                    <li>
                        <span class="font-semibold">Lengkapi Profil:</span><br>
                        Lengkapi data diri di halaman profil, terutama NIK dan No. HP yang aktif.
                    </li>
                    <li>
                        <span class="font-semibold">Kirim Proposal:</span><br>
                        Buka menu "Kirim Proposal", isi formulir, dan unggah file proposal dalam format PDF.
                    </li>
                    <li>
                        <span class="font-semibold">Pantau Status Proposal:</span><br>
                        Anda bisa melihat status proposal Anda (Diproses, Disetujui, Ditolak) langsung di dashboard ini.
                    </li>
                </ol>
            </div>
        </div>


        {{-- ======================================================= --}}
        {{-- == BAGIAN 3: PROSES SETELAH PROPOSAL DITERIMA ========== --}}
        {{-- ======================================================= --}}
        <div class="upcoming">
            <div class="header">
                <h4>Setelah Proposal Disetujui?</h4>
                <a href="#">#InfoPenting</a>
            </div>

            <div class="p-4">
                <p class="text-gray-600 text-sm mb-4">
                    Jika proposal Anda telah disetujui, tim kami akan melanjutkan ke tahap berikutnya:
                </p>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start">
                        <i class='bx bx-user-check text-xl text-green-600 mr-3'></i>
                        <div>
                            <h5 class="font-semibold">Verifikasi & Konfirmasi</h5>
                            <p class="text-xs text-gray-500">Petugas kami akan menghubungi ketua kelompok melalui No. HP untuk verifikasi data lapangan.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bx-calendar-event text-xl text-blue-600 mr-3'></i>
                        <div>
                            <h5 class="font-semibold">Penentuan Jadwal</h5>
                            <p class="text-xs text-gray-500">Setelah verifikasi berhasil, akan ditentukan jadwal untuk penyaluran bantuan.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bx-package text-xl text-yellow-600 mr-3'></i>
                        <div>
                            <h5 class="font-semibold">Penyaluran Bantuan</h5>
                            <p class="text-xs text-gray-500">Bantuan akan disalurkan sesuai jadwal yang telah disepakati bersama.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class='bx bxs-report text-xl text-red-600 mr-3'></i>
                        <div>
                            <h5 class="font-semibold">Kewajiban Pelaporan</h5>
                            <p class="text-xs text-gray-500">Setelah bantuan diterima, kelompok wajib mengirimkan Laporan Kegiatan melalui sistem ini.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assetss/script.js"></script>

</body>

</html>