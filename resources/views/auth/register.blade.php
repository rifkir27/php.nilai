@extends('layouts.auth')

@section('title', 'Register - Aplikasi Siswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Logo dan Nama Aplikasi -->
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <i class="fas fa-school fa-3x text-white mb-2"></i>
                    <h1 class="text-white">Aplikasi Siswa</h1>
                </a>
            </div>

            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x text-primary"></i>
                        <h3 class="mt-3">Daftar Akun Guru</h3>
                        <p class="text-muted">Lengkapi data untuk membuat akun</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Username -->
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

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- NIP -->
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                       name="nip" value="{{ old('nip') }}" required>
                            </div>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
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

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Sudah punya akun?</p>
                            <a href="{{ route('login') }}" class="btn btn-link">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Link kembali ke beranda -->
            <div class="text-center mt-4">
                <a href="/" class="text-white text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
