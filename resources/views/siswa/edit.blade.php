{{-- resources/views/siswa/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $siswa->kelas) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Siswa</button>
    </form>
</div>
@endsection