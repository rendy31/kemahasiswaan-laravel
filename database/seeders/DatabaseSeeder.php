<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'rendy@gmail.com',
            'password' => BCRYPT('12345'),
        ]);

        $this->call([
            CategorySeeder::class,
            // AchievementsTableSeeder::class,
            // PostSeeder::class,
            OrganizationSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
