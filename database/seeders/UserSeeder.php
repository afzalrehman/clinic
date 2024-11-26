<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Super Admin
            [
                'name' => 'super-admin',
                'username' => 'superadmin',
                'phone' => '039320900234',
                'email' => 'superadmin@gmail.com',
                'role' => 0,
                'password' => Hash::make(12345678),
                'status' => 'active',
            ],

            // Admin
            [
                'name' => 'admin',
                'username' => 'admin',
                'phone' => '039320900234',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => Hash::make(12345678),
                'status' => 'active',
            ],

            // Doctor
            [
                'name' => 'doctor',
                'username' => 'doctor',
                'phone' => '039320900234',
                'email' => 'doctor@gmail.com',
                'role' => 2, // Doctor roles
                'password' => Hash::make(12345678),
                'status' => 'active',
            ],

            // Patient
            [
                'name' => 'patient',
                'username' => 'patient',
                'phone' => '039320900234',
                'email' => 'patient@gmail.com',
                'role' => 3, // Patient roles
                'password' => Hash::make(12345678),
                'status' => 'active',
            ],
        ]);
    }
}
