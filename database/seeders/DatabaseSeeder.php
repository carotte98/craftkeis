<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create();

        Category::create([
            'name' => '2D'
        ]);
        Category::create([
            'name' => '3D'
        ]);
    }
}
