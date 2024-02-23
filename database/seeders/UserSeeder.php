<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@monitoring.local',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'id' => 2,
            'name' => 'petugas',
            'email' => 'petugas@monitoring.local',
            'password' => bcrypt('12345678'),
            'role' => 'petugas'
        ]);

        User::create([
            'id' => 3,
            'name' => 'user',
            'email' => 'user@monitoring.local',
            'password' => bcrypt('12345678'),
            'role' => 'user'
        ]);
    }
}
