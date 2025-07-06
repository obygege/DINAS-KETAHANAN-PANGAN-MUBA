<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Kita butuh Chart.js untuk membuat grafik --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
    <title>Dashboard Super Admin</title>
</head>

<body>

    <!-- Sidebar -->
    @include('admin.superadmin.sidebar')
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        @include('admin.superadmin.navbar')
        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Insights -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">

                <div class="card mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ $adminName }}!</h1>
                    <p class="text-gray-500 mt-1">Ini adalah ringkasan statistik Laporan Kegiatan untuk tahun {{ $selectedYear }}.</p>
                </div>

                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <li class="card flex items-center">
                        <i class='bx bxs-report text-4xl text-blue-500 bg-blue-100 p-3 rounded-full'></i>
                        <span class="info ml-4">
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $totalLaporanTahunIni }}</h3>
                            <p class="text-gray-500">Laporan di {{ $selectedYear }}</p>
                        </span>
                    </li>
                    <li class="card flex items-center">
                        <i class='bx bx-archive text-4xl text-green-500 bg-green-100 p-3 rounded-full'></i>
                        <span class="info ml-4">
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $totalLaporanSemua }}</h3>
                            <p class="text-gray-500">Total Semua Laporan</p>
                        </span>
                    </li>
                    <li class="card flex items-center">
                        <i class='bx bxs-group text-4xl text-yellow-500 bg-yellow-100 p-3 rounded-full'></i>
                        <span class="info ml-4">
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $totalUserAktif }}</h3>
                            <p class="text-gray-500">User Aktif di {{ $selectedYear }}</p>
                        </span>
                    </li>
                </ul>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="card lg:col-span-2">
                        <div class="header flex justify-between items-center mb-4">
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800">Grafik Laporan per Bulan</h3>
                                <p class="text-sm text-gray-500">Tahun {{ $selectedYear }}</p>
                            </div>
                            <div class="flex items-center space-x-1 bg-gray-100 p-1 rounded-lg">
                                @foreach ($availableYears as $year)
                                <a href="{{ route('admin.dashboard', ['year' => $year]) }}"
                                    class="px-3 py-1 text-sm font-medium rounded-md transition-colors
                            {{ $selectedYear == $year ? 'bg-blue-600 text-white shadow' : 'text-gray-600 hover:bg-gray-200' }}">
                                    {{ $year }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <canvas id="laporanChart"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header mb-4">
                            <h3 class="font-semibold text-lg text-gray-800">Laporan Terbaru</h3>
                        </div>
                        <ul class="space-y-4">
                            @forelse ($laporanTerbaru as $laporan)
                            <li class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $laporan->user->avatar ? asset('storage/' . $laporan->user->avatar) : asset('images/default-avatar.png') }}" alt="Avatar">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $laporan->user->nama ?? 'N/A' }}</p>
                                    <p class="text-xs text-gray-500">{{ $laporan->jenis_kegiatan }} - {{ \Carbon\Carbon::parse($laporan->tanggal_laporan)->diffForHumans() }}</p>
                                </div>
                            </li>
                            @empty
                            <li class="text-sm text-gray-500">Belum ada laporan.</li>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </main>

            {{-- Script untuk menginisialisasi Grafik --}}
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('laporanChart');
                    if (ctx) {
                        new Chart(ctx, {
                            type: 'line', // Jenis grafik: garis
                            data: {
                                labels: @json($chartLabels), // Label sumbu-X (Jan, Feb, Mar, ...)
                                datasets: [{
                                    label: 'Jumlah Laporan',
                                    data: @json($chartData), // Data sumbu-Y (jumlah laporan per bulan)
                                    fill: false,
                                    borderColor: 'rgb(59, 130, 246)', // Warna garis (biru)
                                    tension: 0.1,
                                    pointBackgroundColor: 'rgb(59, 130, 246)',
                                    pointRadius: 5
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            // Memastikan hanya angka bulat di sumbu Y
                                            precision: 0
                                        }
                                    }
                                }
                            }
                        });
                    }
                });
            </script>
            <!-- End of Reminders-->

    </div>

    </main>

    </div>

    <script src="../index.js"></script>
</body>

</html>