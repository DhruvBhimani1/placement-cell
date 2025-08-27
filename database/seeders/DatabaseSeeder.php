<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // Create the Admin and Student users
    User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'role' => 'admin',
    ]);

    User::factory()->create([
        'name' => 'Student User',
        'email' => 'student@example.com',
        'role' => 'student',
    ]);

    // Call other seeders
    $this->call([
        BranchSeeder::class,
    ]);
}
}
