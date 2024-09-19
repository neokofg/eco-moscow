<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(),
            'requisites' => 'some requisites',
            'sum_gathered' => rand(0,5000),
            'sum_needed' => rand(10000,100000),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
