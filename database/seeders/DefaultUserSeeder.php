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
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '1234',
            'is_creator' => false,
        ]);

        User::factory()->create([
            'name' => 'Maus Kaetti',
            'email' => 'maus@gmail.com',
            'password' => '1234',
            'is_creator' => true,
        ]);

        User::factory()->create([
            'name' => 'Jhempi',
            'is_creator' => true,
        ]);

        User::factory()->create([
            'name' => 'xXCoolArtistXx',
            'is_creator' => true,
        ]);
        
        auth()->login($user); // Log in the created user

    }
}
