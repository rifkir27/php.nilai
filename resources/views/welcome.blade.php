<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://source.unsplash.com/1200x800/?school') center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-login {
            border-radius: 10px;
            padding: 12px 20px;
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kolom Kiri - Text -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di Aplikasi Siswa</h1>
                    <p class="lead mb-4">Platform manajemen data siswa dan nilai yang memudahkan proses pembelajaran dan evaluasi</p>
                </div>

                <!-- Kolom Kanan - Login Form -->
                <div class="col-lg-5 offset-lg-1">
                    <div class="card login-card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-user-circle fa-3x text-primary"></i>
                                <h3 class="mt-3">Login</h3>
                                <p class="text-muted">Masukkan username dan password Anda</p>
                            </div>

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                               name="username" value="{{ old('username') }}" required autofocus>
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                               name="password" required>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Ingat Saya</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 btn-login">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>