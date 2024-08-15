<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'nik' => '123456',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'nik' => '1234568',
                'role' => 'non_admin',
                'password' => bcrypt('123456'),
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
