<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas'; // Pastikan nama tabel sesuai
    protected $fillable = ['nama', 'nis', 'kelas']; // Kolom yang dapat diisi

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}