<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '1234',
            'is_creator' => false,
        ]);
        
        $user = User::create([
            'name' => 'Client',
            'email' => 'default@example.com',
            'password' => '1234',
            'is_creator' => false,
        ]);
        
        auth()->login($user); // Log in the created user

    }
}
