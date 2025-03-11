@extends('layouts.app')

@section('title', 'Data Siswa')

@php
function getNilaiBadgeColor($nilai) {
    if ($nilai >= 85) return 'success';
    if ($nilai >= 70) return 'primary';
    if ($nilai >= 55) return 'warning';
    return 'danger';
}
@endphp

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-users"></i> Data Siswa</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Siswa Baru
            </a>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" name="search" 
                               placeholder="Cari nama atau NIS..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="kelas" class="form-select">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelasOptions as $kelas)
                            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th class="text-center">Nilai Harian</th>
                            <th class="text-center">UH 1</th>
                            <th class="text-center">UH 2</th>
                            <th class="text-center">Nilai Akhir</th>
                            <th class="text-center">Rata-rata</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $index => $s)
                            <tr>
                                <td>{{ $siswa->firstItem() + $index }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->kelas }}</td>
                                <td>
                                    @if($s->jenis_kelamin == 'Laki-laki')
                                        <i class="fas fa-male text-primary"></i>
                                    @else
                                        <i class="fas fa-female text-danger"></i>
                                    @endif
                                    {{ $s->jenis_kelamin }}
                                </td>
                                <td class="text-center">{{ number_format($s->nilai_harian, 2) }}</td>
                                <td class="text-center">{{ number_format($s->ulangan_1, 2) }}</td>
                                <td class="text-center">{{ number_format($s->ulangan_2, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $s->nilai_akhir >= 85 ? 'success' : ($s->nilai_akhir >= 70 ? 'primary' : ($s->nilai_akhir >= 55 ? 'warning' : 'danger')) }}">
                                        {{ number_format($s->nilai_akhir, 2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ number_format($s->rata_rata, 2) }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('siswa.show', $s->id) }}" 
                                           class="btn btn-info btn-sm" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('siswa.edit', $s->id) }}" 
                                           class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                onclick="confirmDelete({{ $s->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data siswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    Menampilkan {{ $siswa->firstItem() ?? 0 }} - {{ $siswa->lastItem() ?? 0 }} 
                    dari {{ $siswa->total() ?? 0 }} data
                </div>
                <div>
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const form = document.getElementById('deleteForm');
    form.action = `/siswa/${id}`;
    modal.show();
}

function getNilaiBadgeColor(nilai) {
    if (nilai >= 85) return 'success';
    if (nilai >= 70) return 'primary';
    if (nilai >= 55) return 'warning';
    return 'danger';
}
</script>
@endpush
@endsection

