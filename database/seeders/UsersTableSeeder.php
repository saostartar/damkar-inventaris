<?php
// database/seeders/UsersTableSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create Manager account
        User::create([
            'name' => 'Manager Damkar',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager123'),
            'role' => 'Manager',
            'email_verified_at' => now(),
        ]);

        // Create Staff account
        User::create([
            'name' => 'Staff Damkar',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'),
            'role' => 'Staff', 
            'email_verified_at' => now(),
        ]);
    }
}