<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'category' => Category::factory(),
            'director' => $this->faker->sentence(),
            'release_date' => $this->faker->sentence(),
            'description' => $this->faker->sentence(rand(1,3), true),
            'image' =>$this->faker->imageUrl()
        ];
    }
    
}
