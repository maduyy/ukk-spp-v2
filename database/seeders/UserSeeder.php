<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4(),
                'username' => 'admin',
                'password' => Hash::make('123'),
                'nama_petugas' => 'adminjpeg',
                'role' => 'Admin',
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4(),
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'nama_petugas' => 'petugasjpeg',
                'role' => 'Petugas',
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4(),
                'username' => 'siswa',
                'password' => Hash::make('123'),
                'nama_petugas' => 'siswajpeg',
                'role' => 'Siswa',
            ]
        ];

        User::insert($data);
    }
}
