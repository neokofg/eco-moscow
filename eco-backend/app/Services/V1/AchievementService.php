<?php

namespace App\Services\V1;

use App\Contracts\ServiceInterfaces\AchievementServiceInterface;
use App\Presenters\AchievementPresenter;
use App\Repositories\V1\AchievementRepository;
use Illuminate\Database\Eloquent\Collection;

final readonly class AchievementService implements AchievementServiceInterface
{
    /**
     * @param AchievementRepository $achievementRepository
     * @param AchievementPresenter $achievementPresenter
     */
    public function __construct(
        private AchievementRepository $achievementRepository,
        private AchievementPresenter  $achievementPresenter
    )
    {
    }

    /**
     * @return mixed
     */
    public function achievementsIndex(): mixed
    {
        $achievements = $this->achievementRepository->achievementIndex();

        return $this->achievementPresenter->presentIndex($achievements);
    }
}
