<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }}</title>
    
    {{-- Asumsi kamu menggunakan Bootstrap & CSS dari template yang sama --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 50px; }
        .berita-container { max-width: 800px; margin: auto; }
        .berita-gambar { width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;}
        .berita-konten { font-size: 1.1rem; line-height: 1.8; }
    </style>
</head>
<body>
    <div class="container berita-container">
        
        <h1 class="mb-3">{{ $berita->judul }}</h1>
        
        <p class="text-muted mb-4">
            Dipublikasikan pada: {{ $berita->created_at->translatedFormat('d F Y') }}
        </p>
        
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="berita-gambar">
        
        <div class="berita-konten mt-4">
            {{-- nl2br akan mengubah baris baru (enter) menjadi tag <br> --}}
            {!! nl2br(e($berita->konten)) !!}
        </div>
        
        <div class="mt-5">
            <a href="{{ url('/') }}" class="btn btn-primary">&laquo; Kembali ke Halaman Utama</a>
        </div>
        
    </div>
</body>
</html>