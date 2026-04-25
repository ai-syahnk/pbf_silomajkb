<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@silomajkb.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@silomajkb.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
