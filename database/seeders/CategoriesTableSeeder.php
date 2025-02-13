<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Make sure you include the User model if you need to reference user IDs

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // You can choose a specific user or use the first user
        $user = User::first(); // Get the first user or you can specify any user ID

        $categories = [
            ['name' => 'Software Developer', 'user_id' => $user->id],
            ['name' => 'Designer', 'user_id' => $user->id],
            ['name' => 'Project Manager', 'user_id' => $user->id],
            ['name' => 'HR Specialist', 'user_id' => $user->id],
            ['name' => 'Sales Executive', 'user_id' => $user->id],
            ['name' => 'Marketing Manager', 'user_id' => $user->id],
            ['name' => 'Customer Support', 'user_id' => $user->id],
            ['name' => 'Data Analyst', 'user_id' => $user->id],
        ];

        // Insert categories into the categories table
        DB::table('categories')->insert($categories);
    }
}
