<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\MainDb\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = Competition::class;

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
