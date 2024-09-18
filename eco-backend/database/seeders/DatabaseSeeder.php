<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Important\AchievementSeeder;
use Database\Seeders\Important\CategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AchievementSeeder::class,
            CategorySeeder::class
        ]);
    }
}
