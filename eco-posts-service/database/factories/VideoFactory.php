<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->sentence(),
            'preview_url' => $this->faker->imageUrl(),
            'video_url' => 'https://cdn.eco-mos.ru/rickroll.mp4',
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
