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
            'user_id' => 1,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'tags' => "[1, 2, 3]",
            'comments' => "[1, 2, 3]",
            'likes' => $this->faker->numberBetween(0, 100),
            'views' => $this->faker->numberBetween(0, 100),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
