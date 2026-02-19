<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure the User model path is correct
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'technology@tutor123.ca'], 
            [
                'name' => 'Admin',
                'password' => Hash::make('Vaughanstar@123'), // set a secure password
            ]
        );
    }
}
