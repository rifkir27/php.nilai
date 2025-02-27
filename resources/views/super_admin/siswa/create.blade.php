@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-user-plus"></i> Tambah Siswa Baru</h5>
                    <a href="{{ route('super_admin.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('super_admin.siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" 
                                   name="nis" value="{{ old('nis') }}" required>
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                    name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kelas</label>
                            <select class="form-select @error('kelas') is-invalid @enderror" 
                                    name="kelas" required>
                                <option value="">Pilih Kelas</option>
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" {{ old('kelas') == $i ? 'selected' : '' }}>
                                        Kelas {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Password akan dibuat otomatis menggunakan NIS siswa
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 