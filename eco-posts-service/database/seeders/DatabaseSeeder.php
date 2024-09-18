<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Optional\NewsSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NewsSeeder::class
        ]);
    }
}
