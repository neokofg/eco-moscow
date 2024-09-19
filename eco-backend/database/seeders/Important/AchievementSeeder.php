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
        Achievement::factory([
            'key' => 'ECONOVATOR',
            'title' => 'Эконоватор',
            'description' => '1-3 мероприятия',
        ])->create();
        Achievement::factory([
            'key' => 'ECOEXPERIENCED',
            'title' => 'Опытный организатор',
            'description' => '4-10 мероприятий',
        ])->create();
        Achievement::factory([
            'key' => 'ECOLEADER',
            'title' => 'Лидер сообщества',
            'description' => '10+ мероприятий',
        ])->create();
        Achievement::factory([
            'key' => 'ECOEXPERT',
            'title' => 'Эксперт экосообщества',
            'description' => '20+ мероприятий',
        ])->create();
        Achievement::factory([
            'key' => 'NEWBIE',
            'title' => 'Эко-новичок',
            'description' => 'Вы зарегистрировались на портале!',
        ])->create();
        Achievement::factory([
            'key' => 'ACTIVE',
            'title' => 'Эко-активист',
            'description' => 'Награда значок и шоппер',
        ])->create();
        Achievement::factory([
            'key' => 'LEADER',
            'title' => 'Эко-лидер',
            'description' => 'Билет на любое мероприятие/скидку на товары эко-партнеров',
        ])->create();
        Achievement::factory([
            'key' => 'AMBASSADOR',
            'title' => 'Амбассадор',
            'description' => 'Возможность участия в масштабных инициативах',
        ])->create();
    }
}
