<?php

namespace Database\Seeders\Important;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::factory([
            'key' => 'PROFILE_FILLED',
            'title' => 'Свой человек',
            'description' => 'Вы заполнили свой профиль на 100%',
        ])->create();
    }
}
