@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Nilai</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="siswa_id">Siswa:</label>
                <select name="siswa_id" class="form-control" required>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswa->id == $nilai->siswa_id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" name="nilai" class="form-control" value="{{ old('nilai', $nilai->nilai) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
