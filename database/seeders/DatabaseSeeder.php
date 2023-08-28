<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Category::create([
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

        
        $this->call([
            DefaultUserSeeder::class,
            ServiceSeeder::class,
        ]);

        Product::factory(10)->create();

    }
}
