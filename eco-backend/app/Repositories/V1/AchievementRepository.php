<?php

namespace App\Repositories\V1;

use App\Models\Achievement;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

final readonly class AchievementRepository extends Repository
{
    public function achievementIndex(): Collection
    {
        return Achievement::all();
    }
}
