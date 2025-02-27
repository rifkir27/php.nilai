<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'kelas',
        'nilai_harian',
        'ulangan_1',
        'ulangan_2',
        'nilai_akhir',
        'rata_rata'
    ];

    // Relasi dengan tabel Nilai
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'siswa_id', 'id');
    }
}
