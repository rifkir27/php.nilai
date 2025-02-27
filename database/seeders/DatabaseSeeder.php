use App\Models\Siswa;
use App\Models\Nilai;
use Database\Seeders\SiswaAuthSeeder;

public function run()
{
    $siswa = Siswa::create([
        'nama' => 'Budi Santoso',
        'nis' => '123456',
        'jenis_kelamin'
        'kelas' => '10A'

    ]);

    Nilai::create([
        'siswa_id' => $siswa->id,
        'nilai_harian' => 85,
        'ulangan_1' => 80,
        'ulangan_2' => 90,
        'nilai_akhir' => 88
    ]);

    $this->call([
        // ... other seeders
        SiswaAuthSeeder::class,
    ]);
}
