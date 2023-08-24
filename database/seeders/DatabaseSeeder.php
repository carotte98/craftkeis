<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // $user = User::factory()->create();

        $base = Category::create([
            'name' => '3D Modelling'
        ]);
        Category::create([
            'name' => '2D Illustration'
        ]);
        Category::create([
            'name' => 'Painting'
        ]);
        Category::create([
            'name' => 'SFX'
        ]);
        Category::create([
            'name' => 'Wood Sculpting'
        ]);
        Category::create([
            'name' => 'Logo Design'
        ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '1234',
            'is_creator' => false,
        ]);

        $creator = User::factory()->create([
            'name' => 'Maus Kaetti',
            'is_creator' => true,
        ]);

        Service::factory(4)->create([
            'user_id' => $creator->id,
            'category_id' => $base->id
        ]);



    }
}
