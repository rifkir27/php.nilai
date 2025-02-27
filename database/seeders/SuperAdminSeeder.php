<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Hapus super admin yang mungkin sudah ada
        DB::table('users')->where('role', 'super_admin')->delete();

        // Buat super admin baru
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'nip' => null
        ]);

        $this->command->info('Super Admin berhasil dibuat:');
        $this->command->info('Username: admin');
        $this->command->info('Password: admin123');
    }
} 