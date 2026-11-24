<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Role Super Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'role' => 'Super Admin',
            ]
        );

        // 2. User Role Pelanggan
        User::updateOrCreate(
            ['email' => 'pelanggan@gmail.com'],
            [
                'name' => 'Pelanggan Satu',
                'password' => Hash::make('password123'),
                'role' => 'Pelanggan',
            ]
        );
    }
}
