<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Atur Ulang Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body{font-family:'Poppins',sans-serif;background-color:#00A70B;display:flex;justify-content:center;align-items:center;min-height:100vh;padding:1rem 0}.form-container{background-color:#fff;padding:2.5rem;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.1)}.btn-register{background-color:#00A70B;color:#fff;font-weight:600;padding:12px;border:none;transition:background-color .3s ease}.btn-register:hover{background-color:#008f0a;color:#fff}.login-link a{color:#00A70B;text-decoration:none;font-weight:600}.login-link a:hover{text-decoration:underline} </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="form-container">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Atur Ulang Password</h2>
                        <p class="text-muted">Masukkan password baru Anda.</p>
                    </div>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                             @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-grid pt-3">
                            <button type="submit" class="btn btn-register">Simpan Password Baru</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted login-link">
                            <a href="{{ route('login') }}">&larr; Kembali ke Halaman Login</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>