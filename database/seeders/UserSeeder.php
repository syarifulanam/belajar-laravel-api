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
        $users = [
            [
                'name' => 'Admin Anam',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Creator Firman',
                'email' => 'creator@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Editor Putri',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('12345678')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
