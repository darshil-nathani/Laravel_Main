<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Myblog>
 */
class MyblogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);
        $slug = Str::slug($title,'-');
        return [
            'title' => $title,
            'subtitle' => fake()->sentence(10,true),
            'body_content' => fake()->paragraph(5, true),
            'slug' => $slug,
            'user_id' => rand(1,10)
        ];
    }
}
