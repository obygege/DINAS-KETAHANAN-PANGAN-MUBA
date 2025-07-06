<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #00A70B;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-register {
            background-color: #00A70B;
            color: white;
            font-weight: 600;
            padding: 12px;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #008f0a;
            color: white;
        }

        .login-link a {
            color: #00A70B;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="form-container" data-aos="fade-up" data-aos-duration="1000">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Buat Akun Baru</h2>
                        <p class="text-muted">Isi data di bawah ini untuk mendaftar.</p>
                    </div>

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan 16 digit NIK" value="{{ old('nik') }}" required>
                            @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ketua Kelompok</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama ketua kelompok" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. Handphone</label>
                            <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Buat password yang kuat" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid pt-3">
                            <button type="submit" class="btn btn-register">Daftar</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p class="text-muted login-link">
                            Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>