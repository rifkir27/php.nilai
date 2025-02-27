@extends('layouts.auth')

@section('title', 'Login - Aplikasi Siswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- Logo dan Nama Aplikasi -->
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <i class="fas fa-school fa-3x text-white mb-2"></i>
                    <h1 class="text-white">Aplikasi Siswa</h1>
                </a>
            </div>

            <div class="card shadow">
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                    </form>

                    <!-- Menambahkan tombol untuk registrasi -->
                    <div class="form-group">
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
