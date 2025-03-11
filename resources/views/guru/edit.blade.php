@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                   id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nis">NIS</label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" 
                   id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                    id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ (old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki') ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan" {{ (old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan') ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control @error('kelas') is-invalid @enderror" 
                   id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
            @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr>
        <h4>Data Nilai</h4>

        <div class="form-group mb-3">
            <label for="nilai_harian">Nilai Harian</label>
            <input type="number" step="0.01" min="0" max="100" class="form-control @error('nilai_harian') is-invalid @enderror" 
                   id="nilai_harian" name="nilai_harian" value="{{ old('nilai_harian', $siswa->nilai_harian) }}">
            @error('nilai_harian')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="ulangan_1">Ulangan Harian 1</label>
            <input type="number" step="0.01" min="0" max="100" class="form-control @error('ulangan_1') is-invalid @enderror" 
                   id="ulangan_1" name="ulangan_1" value="{{ old('ulangan_1', $siswa->ulangan_1) }}">
            @error('ulangan_1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="ulangan_2">Ulangan Harian 2</label>
            <input type="number" step="0.01" min="0" max="100" class="form-control @error('ulangan_2') is-invalid @enderror" 
                   id="ulangan_2" name="ulangan_2" value="{{ old('ulangan_2', $siswa->ulangan_2) }}">
            @error('ulangan_2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menghitung nilai akhir dan rata-rata
    function hitungNilai() {
        const nilaiHarian = parseFloat(document.getElementById('nilai_harian').value) || 0;
        const ulangan1 = parseFloat(document.getElementById('ulangan_1').value) || 0;
        const ulangan2 = parseFloat(document.getElementById('ulangan_2').value) || 0;
        
        // Hitung nilai akhir (misalnya: 30% NH + 35% UH1 + 35% UH2)
        const nilaiAkhir = (nilaiHarian * 0.3) + (ulangan1 * 0.35) + (ulangan2 * 0.35);
        
        // Hitung rata-rata
        const rataRata = (nilaiHarian + ulangan1 + ulangan2) / 3;
        
        // Update hidden inputs
        document.getElementById('nilai_akhir').value = nilaiAkhir.toFixed(2);
        document.getElementById('rata_rata').value = rataRata.toFixed(2);
    }

    // Tambahkan event listener untuk setiap input nilai
    ['nilai_harian', 'ulangan_1', 'ulangan_2'].forEach(id => {
        document.getElementById(id).addEventListener('change', hitungNilai);
    });
});
</script>
@endpush
@endsection
