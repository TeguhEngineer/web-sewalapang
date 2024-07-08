<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'password' => bcrypt('password'),
            'no_tlp'   => '000000000000',
            'alamat'   => 'indonesia',
            'role'     => 'admin'
        ]);

        User::create([
            'username' => 'User',
            'password' => bcrypt('password'),
            'no_tlp'   => '85353235600',
            'alamat'   => 'indonesia',
            'role'     => 'user'
        ]);
    }
}
