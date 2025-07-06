<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Asumsi body punya background color dari style.css utama, jika tidak, bisa ditambahkan di sini */
        /* body { background-color: #f1f0f6; font-family: 'Poppins', sans-serif; } */
        .card {
            background-color: #fff;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }

        .header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .insights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .insights li {
            display: flex;
            align-items: center;
            padding: 1.5rem;
        }

        .insights li i {
            font-size: 2.5rem;
        }

        .insights li .info {
            margin-left: 1rem;
        }

        .insights li .info h3 {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .insights li .info p {
            font-size: 0.875rem;
            color: #666;
        }

        .bottom-data {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .chart-container {
            position: relative;
            height: 320px;
            width: 100%;
        }
    </style>
    <title>Dashboard Admin</title>
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
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Insights -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">

                <div class="card mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ $adminName }}!</h1>
                    <p class="text-gray-500 mt-1">Berikut adalah ringkasan data utama sistem.</p>
                </div>

                <!-- Insights -->
                <ul class="insights">
                    <li class="card">
                        <i class='bx bxs-report text-4xl text-blue-500'></i>
                        <span class="info">
                            <h3>{{ $totalLaporanSemua }}</h3>
                            <p>Total Laporan Kegiatan</p>
                        </span>
                    </li>
                    <li class="card">
                        <i class='bx bxs-file-import text-4xl text-green-500'></i>
                        <span class="info">
                            <h3>{{ $totalProposalSemua }}</h3>
                            <p>Total Proposal Masuk</p>
                        </span>
                    </li>
                    {{-- Kartu statistik lainnya bisa ditambahkan di sini jika perlu --}}
                </ul>
                <!-- End of Reminders-->

    </div>

    </main>

    </div>

    <script src="../index.js"></script>
</body>

</html>