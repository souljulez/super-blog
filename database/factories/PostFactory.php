<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
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
        $title = fake()->words(rand(1,5), true);

        return [
            'title' => $title,
            'author' => fake()->name,
            'category' => fake()->randomElement(Post::$categories),
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(rand(3, 8), true)
        ];
    }
}
