<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed a user with the 'user' type
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user@test.com',
            'contact_number' => '1234567890',
            'address' => '123 Main St',
            'specialty' => 'General',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'type' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed a user with the 'doctor' type
        DB::table('users')->insert([
            'name' => 'Jane Smith',
            'email' => 'doctor@test.com',
            'contact_number' => '0987654321',
            'address' => '456 Elm St',
            'specialty' => 'Pediatrics',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'type' => 'doctor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed a user with the 'admin' type
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'admin@test.com',
            'contact_number' => '0987654321',
            'address' => '456 Elm St',
            'specialty' => 'Pediatrics',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'type' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
