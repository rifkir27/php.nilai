@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-graduate fa-3x text-success"></i>
                        <h2 class="mt-3">Login Siswa</h2>
                        <p class="text-muted">Masuk untuk melihat nilai</p>
                    </div>

                    <form method="POST" action="{{ route('siswa.login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                       name="username" value="{{ old('username') }}" required autofocus
                                       placeholder="Masukkan NIS">
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
                                       name="password" required placeholder="Password sama dengan NIS">
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-muted">
                                <i class="fas fa-chalkboard-teacher me-1"></i>Login sebagai Guru
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5><i class="fas fa-info-circle me-2"></i>Informasi Login Siswa:</h5>
                    <ul class="mb-0">
                        <li>Username adalah NIS Anda</li>
                        <li>Password awal sama dengan NIS Anda</li>
                        <li>Harap ganti password setelah login pertama kali</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 