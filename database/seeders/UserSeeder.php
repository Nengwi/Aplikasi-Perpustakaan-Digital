<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role-nya dulu (Hanya jika belum ada)
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // 2. Buat Akun Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('password123'),
            ]
        );
        // Tempelkan Role Admin ke user ini
        $admin->assignRole($adminRole);

        // 3. Buat Akun User Biasa
        // Di dalam UserSeeder.php
        $user = User::updateOrCreate(
            ['email' => 'dwi@gmail.com'], // Ganti dengan email yang dwi pakai login
            ['name' => 'Dwi User', 'password' => Hash::make('12345dwi')]
        );
        $user->assignRole('user'); // Ini yang bikin dwi punya hak akses!
    }
}
