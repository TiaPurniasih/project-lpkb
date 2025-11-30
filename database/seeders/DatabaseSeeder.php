<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super-admin@example.com',
            'password' => Hash::make('user1234!'),
            'role_level' => User::ROLE_SUPERADMIN,
        ]);

        User::factory()->create([
            'name' => 'Hermawan',
            'email' => 'admin@example.com',
            'password' => Hash::make('user1234!'),
            'role_level' => User::ROLE_ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Bernadio',
            'email' => 'kanwiljakbar@example.com',
            'password' => Hash::make('user1234!'),
            'role_level' => User::ROLE_KANWIL,
        ]);

        User::factory()->create([
            'name' => 'Ujang',
            'email' => 'ujang@example.com',
            'password' => Hash::make('user1234!'),
            'role_level' => User::ROLE_USER,
        ]);

    }
}
