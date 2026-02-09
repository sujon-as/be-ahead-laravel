<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Default admin user
        User::create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '01712345678',
            'password' => '123456',
            'status' => 'Active',
            'remember_token' => Str::random(10),
        ]);
    }
}
