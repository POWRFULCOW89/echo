<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'likes' => $this->faker->numberBetween(0, 100),
            'views' => $this->faker->numberBetween(0, 100),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
