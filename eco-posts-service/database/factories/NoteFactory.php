<?php

namespace Database\Factories;

use App\Models\MainDb\Category;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'content' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
