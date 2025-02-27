@php
use App\Helpers\NilaiHelper;
@endphp

<table class="table">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nilais as $nilai)
        <tr>
            <td>{{ $nilai->siswa->nama }}</td>
            <td>
                <span class="badge bg-{{ NilaiHelper::getNilaiBadgeColor($nilai->nilai_akhir) }}">
                    {{ number_format($nilai->nilai_akhir, 2) }}
                </span>
            </td>
            <td>{{ NilaiHelper::getNilaiGrade($nilai->nilai_akhir) }}</td>
            <td>{{ NilaiHelper::getNilaiKeterangan($nilai->nilai_akhir) }}</td>
        </tr>
        @endforeach
    </tbody>
</table> 