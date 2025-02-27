<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas'
    ];

    // Relasi dengan tabel Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function getRataRataAttribute()
    {
        return ($this->nilai_tugas + $this->nilai_uts + $this->nilai_uas) / 3;
    }
}
