@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Siswa</h1>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $siswa->nama }}</td>
        </tr>
        <tr>
            <th>NIS</th>
            <td>{{ $siswa->nis }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $siswa->kelas }}</td>
        </tr>
    </table>

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
