<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Gunakan firstOrCreate agar tidak error jika dijalankan ulang
    $admin = Role::firstOrCreate(['name' => 'admin']);
    $editor = Role::firstOrCreate(['name' => 'editor']);
    $journalist = Role::firstOrCreate(['name' => 'journalist']);

    // Untuk User, kita cek dulu apakah emailnya sudah ada
    $user = User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Rombon Admin',
            'password' => bcrypt('password'),
        ]
    );

    $user->assignRole($admin);
}
}
