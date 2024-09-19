<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\MainDb\Category;
use App\Models\User;
use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'location' => Point::makeGeodetic($this->faker->longitude, $this->faker->latitude),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
