<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'content' => $this->faker->sentence(),
            'preview_url' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
