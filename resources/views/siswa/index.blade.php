{{-- resources/views/siswa/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Siswa</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">Tambah Siswa</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Nilai Harian</th>
                <th>Ulangan Harian 1</th>
                <th>Ulangan Harian 2</th>
                <th>Nilai Akhir Semester</th>
                <th>Nilai Rata-rata</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ optional($siswa->nilai->firstWhere('jenis', 'harian'))->nilai ?? '-' }}</td>
                    <td>{{ optional($siswa->nilai->firstWhere('jenis', 'ulangan_harian_1'))->nilai ?? '-' }}</td>
                    <td>{{ optional($siswa->nilai->firstWhere('jenis', 'ulangan_harian_2'))->nilai ?? '-' }}</td>
                    <td>{{ optional($siswa->nilai->firstWhere('jenis', 'akhir_semester'))->nilai ?? '-' }}</td>
                    <td>
                        @php
                            $rataRata = $siswa->nilai->avg('nilai');
                        @endphp
                        {{ $rataRata ? number_format($rataRata, 2) : '-' }}
                    </td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('nilai.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection