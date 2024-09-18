<?php

namespace App\Presenters;

use App\Models\Resources\V1\Achievement\AchievementIndexResource;
use Illuminate\Database\Eloquent\Collection;

final readonly class AchievementPresenter
{
    /**
     * @param Collection $achievements
     * @return mixed
     */
    public function presentIndex(Collection $achievements): mixed
    {
        return AchievementIndexResource::collection($achievements)->response()->getData();
    }
}
