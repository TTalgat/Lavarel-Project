<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Users',
            'email' => 'user@gmail.com',
            'password' => Hash::make('pass1234'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('pass1234'),
            'role' => 'supervisor',
        ]);

        User::create([
            'name' => 'Volunteer',
            'email' => 'volunteer@gmail.com',
            'password' => Hash::make('pass1234'),
            'role' => 'volunteer',
        ]);
    }
}