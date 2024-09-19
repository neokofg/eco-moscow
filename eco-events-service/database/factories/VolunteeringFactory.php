<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\User;
use App\Models\Volunteering;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolunteeringFactory extends Factory
{
    protected $model = Volunteering::class;

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
