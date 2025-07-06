<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harga Pangan</title>
    <style>
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif; 
            font-size: 12px; 
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            text-align: right;
            margin-top: 30px;
            font-size: 10px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>DAFTAR HARGA PANGAN TERKINI</h1>
        <p>DINAS KETAHANAN PANGAN MUSI BANYUASIN</p>
    </div>

    <p>Berikut adalah daftar harga pangan yang tercatat per tanggal : <strong>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</strong></p>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Pangan</th>
                <th style="width: 30%;">Harga per Satuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semua_harga as $key => $harga)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $harga->nama_pangan }}</td>
                <td>Rp {{ number_format($harga->harga_pangan, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">Data harga pangan belum tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dokumen ini resmi dikeluarkan oleh Dinas Ketahanan Pangan Muba.
    </div>

</body>
</html>