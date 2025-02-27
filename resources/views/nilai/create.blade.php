@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Nilai Siswa</h1>
        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai Harian</label>
                <input type="number" step="0.01" name="nilai_harian" id="nilai_harian" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ulangan 1</label>
                <input type="number" step="0.01" name="ulangan_1" id="ulangan_1" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ulangan 2</label>
                <input type="number" step="0.01" name="ulangan_2" id="ulangan_2" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai Akhir</label>
                <input type="number" step="0.01" name="nilai_akhir" id="nilai
