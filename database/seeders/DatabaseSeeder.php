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

        User::factory()->create([
            'name' => 'Jhempi',
            'is_creator' => true,
        ]);

        User::factory()->create([
            'name' => 'xXCoolArtistXx',
            'is_creator' => true,
        ]);

        Service::factory()->create([
            'title' => 'Oil Portraits',
            'description' => 'I do traditional portraits using oil paints.',
            'price' => '70.00',
            'time' => '2 weeks',
            'status' => 'open',
            'user_id' => 2,
            'category_id' => 3
        ]);

        Service::factory()->create([
            'title' => 'Background Art',
            'description' => 'Beautiful backgrounds for videos and more.',
            'price' => '59.99',
            'time' => 'approximatly 1 month',
            'status' => 'open',
            'user_id' => 3,
            'category_id' => 2
        ]);

        Service::factory()->create([
            'title' => 'Stream Alert Sounds',
            'description' => 'Simple sound effects for any stream alerts you may need',
            'price' => '15.50',
            'time' => 'a couple days',
            'status' => 'open',
            'user_id' => 4,
            'category_id' => 4
        ]);

        Service::factory()->create([
            'title' => 'VR Chat Model',
            'description' => '3D character models that can be used for VR Chat',
            'price' => '200.00',
            'time' => '2 months (at least)',
            'status' => 'overbooked',
            'user_id' => 3,
            'category_id' => 1
        ]);



    }
}
