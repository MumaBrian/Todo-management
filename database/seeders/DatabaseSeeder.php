<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if a user with the email already exists, if not, create one
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'], // Check if user with this email exists
            [
                'name' => 'Demo Admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'email_verified_at' => now(),
                'role_id' => 1
            ]
        );

        // Call the CategoriesTableSeeder to insert categories based on job types
        $this->call(CategoriesTableSeeder::class);
    }
}
