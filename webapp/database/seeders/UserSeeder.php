<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data to avoid unique constraint violations
        DB::table('users')->truncate();

        // Define users with names and specific passwords
        $users = [
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'password' => Hash::make('password1'),
                'plain_password' => 'password1' // For console output
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'password' => Hash::make('password2'),
                'plain_password' => 'password2'
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'password' => Hash::make('password3'),
                'plain_password' => 'password3'
            ],
            [
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'password' => Hash::make('password4'),
                'plain_password' => 'password4'
            ],
            [
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'password' => Hash::make('password5'),
                'plain_password' => 'password5'
            ],
        ];

        // Insert each user into the database
        foreach ($users as $userData) {
            // Remove plain_password before inserting
            $plainPassword = $userData['plain_password'];
            unset($userData['plain_password']);
            User::create($userData);

            // Output username and plain password for each user
            $this->command->info("Created user: Name: {$userData['name']}, Email: {$userData['email']}, Password: {$plainPassword}");
        }
    }
}
