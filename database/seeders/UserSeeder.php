<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Common users
        $users = [
            ['name' => 'test', 'region' => 'West', 'state' => 'California', 'role' => '0', 'password' => 'test'],
            ['name' => 'demo', 'region' => 'East', 'state' => 'New York', 'role' => '0', 'password' => 'demo'],
        ];

        // Admin user
        $admin = [
            'name' => 'admin',
            'region' => 'Central',
            'state' => 'Kansas',
            'role' => '1',
            'password' => 'admin',
        ];

        // Insert data into the database
        DB::table('users')->insert(array_merge($users, [$admin]));
    }
}
