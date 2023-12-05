<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'alamat' => 'jl. Agatis',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => '2021',
            'role' => 'admin',
            'password' => Hash::make('admin123')
        ]);
    }
}
