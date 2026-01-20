<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role
        $adminRole = Role::create(['name' => 'admin']);
        $petugasRole = Role::create(['name' => 'petugas']);

        // 2. Buat Akun Admin
        $admin = User::create([
            'name'      => 'Admin Perpustakaan',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'), // passwordnya: password
        ]);
        $admin->assignRole($adminRole);

        // 3. Buat Akun Petugas
        $petugas = User::create([
            'name'      => 'Petugas Mila',
            'email'     => 'petugas@gmail.com',
            'password'  => bcrypt('password'),
        ]);
        $petugas->assignRole($petugasRole);
    }
}