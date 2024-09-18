<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'header' => $this->faker->title,
            'content' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(),
            'category_id' => Category::first()->id
        ];
    }
}
