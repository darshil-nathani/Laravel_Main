<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Myblog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6, true),
            'subtitle' => fake()->sentence(10,true),
            'body_content' => fake()->paragraph(5, true),
            'slug' => fake()->sentence(6,true),
            'user_id' => rand(1,10)
        ];
    }
}
