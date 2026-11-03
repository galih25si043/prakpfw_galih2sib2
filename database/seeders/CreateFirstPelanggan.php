<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFirstPelanggan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Pelanggan::create([
    'first_name' => 'Adi',
    'last_name'  => 'Sucipto',
    'birthday'   => '2000/01/01',
    'gender'     => 'Female',
    'email'      => 'pelanggan@gmail.com',
    'phone'      => '08888888',
    ]);
    }
}
 