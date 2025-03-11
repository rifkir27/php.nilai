@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Nilai</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $n)
                <tr>
                    <td>{{ $n->nama }}</td>
                    <td>{{ $n->nilai }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $n->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 