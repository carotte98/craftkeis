<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titlesLogo = [
            'Small Logo',
            'Logo Design and Branding',
            'Hand-Drawn Illustration',
        ];

        $titles = [
            'Custom Digital Portraits',
            'Logo Design and Branding',
            'Hand-Drawn Illustrations',
            'Character Concept Art',
            'Book Cover Design',
            '3D Modeling and Sculpting',
            'Watercolor Landscape Paintings',
            'Digital Caricatures',
            'Cartoon Animation Videos',
            'Tattoo Design Services',
            'Album Cover Artwork',
            'Custom Avatar Creations',
            'Storyboard Illustrations',
            'Architectural Visualization',
            'Fantasy Map Illustrations',
            'Pet Portrait Commissions',
            'Vector Art and Icons',
            'Comic Book Art',
            'Infographic Design',
            'Calligraphy and Lettering Art',
        ];        

        return [
            'title' => fake()->randomElement($titles),
            'description' => fake()->words(12, true),
            'price' => fake()->randomFloat(2, 3, 1000),
            'time' => fake()->word(),
            'status' => 'open',
            'user_id' => fake()->numberBetween(5, 14),
            'category_id' => fake()->numberBetween(1, 6)
        ];
    }

    // public function category3D() 
    // {
    //     return $this->state(function (array $attributes) use ($titlesLogo) {
    //         return [
    //             'category_id' => 1,
    //             'title' => fake()->randomElement($titles),
    //         ];
    //     });
    // }
    // public function category2D() 
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => 2,
    //             'title' => fake()->randomElement($titles),
    //         ];
    //     });
    // }
    // public function categoryPainting() 
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => 3,
    //             'title' => fake()->randomElement($titles),
    //         ];
    //     });
    // }
    // public function categorySFX() 
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => 4,
    //             'title' => fake()->randomElement($titles),
    //         ];
    //     });
    // }
    // public function categoryWood() 
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => 5,
    //             'title' => fake()->randomElement($titles),
    //         ];
    //     });
    // }
    // public function categoryLogo() 
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => 6,
    //             'title' => fake()->randomElement($titlesLogo),
    //         ];
    //     });
    // }
}
