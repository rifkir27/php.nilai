@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Nilai</h1>
        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select name="siswa_id" class="form-control">
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $nilai->siswa_id == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai Harian</label>
                <input type="text" name="nilai_harian" value="{{ $nilai->nilai_harian }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Ulangan 1</label>
                <input type="text" name="ulangan_1" value="{{ $nilai->ulangan_1 }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Ulangan 2</label>
                <input type="text" name="ulangan_2" value="{{ $nilai->ulangan_2 }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai Akhir</label>
                <input type="text" name="nilai_akhir" value="{{ $nilai->nilai_akhir }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
