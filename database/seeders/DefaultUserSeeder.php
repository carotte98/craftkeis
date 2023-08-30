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
        // admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'craftkeis.devs@gmail.com',
            'password' => 'Password@123',
            'is_creator' => false,
            'image_address' => 'images/Materials-manufacturing.png',
        ]);

        // default logged in user
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'ecbzguth@sharklasers.com',
            'password' => 'Password@123',
            'is_creator' => false,
            'image_address' => 'images/Laugh.png',
        ]);

        auth()->login($user); // Log in the created user

        // example users

        User::factory()->create([
            'name' => 'Maus Kaetti',
            'email' => 'aviikutb@sharklasers.com',
            'password' => 'Password@123',
            'is_creator' => true,
            'image_address' => 'images/Maus-ketti.png',
        ]);

        User::factory()->create([
            'name' => 'Jhempi',
            'is_creator' => true,
        ]);

        User::factory()->create([
            'name' => 'xXCoolArtistXx',
            'is_creator' => true,
        ]);
        
        User::factory()->times(10)->create([
            'is_creator' => true,
        ]);
        
    }
}
