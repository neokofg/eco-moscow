<?php

namespace Database\Seeders\Important;

use App\Models\Achievement;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Экополитика',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoPolicy.png'
            ],
            [
                'title' => 'Экотех',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoTech.png'
            ],
            [
                'title' => 'Экогород',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoCity.png'
            ],
            [
                'title' => 'Экопросвет',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoLiteracy.png'
            ],
            [
                'title' => 'Эколайфхак',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoLifeHack.png'
            ],
            [
                'title' => 'ЗОЖ',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoHealthylifestyle.png'
            ],
            [
                'title' => 'Экоохрана',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoSecurity.png'
            ],
            [
                'title' => 'Экомнение',
                'thumb_url' => 'https://cdn.eco-mos.ru/static/EcoOpinion.png'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category['title'],
                'thumb_url' => $category['thumb_url'],
            ]);
        }
    }
}
