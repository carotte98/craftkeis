<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->create([
            'title' => 'Oil Portraits',
            'description' => 'I do traditional portraits using oil paints.',
            'price' => '70.00',
            'time' => '2 weeks',
            'status' => 'open',
            'user_id' => 3,
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
            'status' => 'closed',
            'user_id' => 3,
            'category_id' => 1
        ]);

        // Service::factory()->count(4)->categoryLogo()->create();
        Service::factory()->times(18)->create();
    }
}
