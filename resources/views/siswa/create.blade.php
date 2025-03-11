{{-- resources/views/siswa/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nama">Nama Siswa:</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama Siswa">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" class="form-control" required placeholder="Masukkan Kelas">
        </div>

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" name="nis" class="form-control" required placeholder="Masukkan NIS Siswa">
        </div>

        <div class="form-group">
            <label for="nilai_harian">Nilai Harian:</label>
            <input type="number" name="nilai_harian" class="form-control" required placeholder="Masukkan Nilai Harian">
        </div>

        <div class="form-group">
            <label for="ulangan_harian_1">Ulangan Harian 1:</label>
            <input type="number" name="ulangan_harian_1" class="form-control" required placeholder="Masukkan Nilai Ulangan Harian 1">
        </div>

        <div class="form-group">
            <label for="ulangan_harian_2">Ulangan Harian 2:</label>
            <input type="number" name="ulangan_harian_2" class="form-control" required placeholder="Masukkan Nilai Ulangan Harian 2">
        </div>

        <div class="form-group">
            <label for="nilai_akhir_semester">Nilai Akhir Semester:</label>
            <input type="number" name="nilai_akhir_semester" class="form-control" required placeholder="Masukkan Nilai Akhir Semester">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Siswa</button>
    </form>
</div>
@endsection