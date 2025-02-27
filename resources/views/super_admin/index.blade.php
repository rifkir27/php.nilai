@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-users-cog"></i> Manajemen Akun</h2>
        </div>
    </div>

    <div class="row">
        <!-- Manajemen Guru -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-chalkboard-teacher"></i> Akun Guru</h5>
                    <a href="{{ route('super_admin.guru.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Guru
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gurus as $guru)
                                <tr>
                                    <td>{{ $guru->name }}</td>
                                    <td>{{ $guru->nip }}</td>
                                    <td>{{ $guru->username }}</td>
                                    <td>{{ $guru->email }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manajemen Siswa -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-user-graduate"></i> Akun Siswa</h5>
                    <a href="{{ route('super_admin.siswa.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Siswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswas as $siswa)
                                <tr>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->kelas }}</td>
                                    <td>{{ $siswa->siswaAuth->username ?? '-' }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 