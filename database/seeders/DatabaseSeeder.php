<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure Super Admin is added only once
        // $superAdminExists = User::where('role', 0)->exists();

        // if (!$superAdminExists) {
        //     User::create([
        //         'name' => 'super-admin',
        //         'username' => 'superadmin',
        //         'phone' => '039320900234',
        //         'email' => 'superadmin@gmail.com',
        //         'role' => 0,
        //         'password' => Hash::make('12345678'),
        //         'status' => 'active',
        //     ]);
        // }

        $this->call(UserSeeder::class);
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
