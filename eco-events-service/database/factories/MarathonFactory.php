<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\Marathon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarathonFactory extends Factory
{
    protected $model = Marathon::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
