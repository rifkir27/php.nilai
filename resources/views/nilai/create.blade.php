@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Nilai</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="siswa_nama">Nama Siswa:</label>
                <select name="siswa_nama" class="form-control" required>
                    <option value="">Pilih Siswa</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->nama }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
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

            <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        </form>
    </div>
@endsection