<?php

namespace App\Controllers\Rest\V1\Achievement;

use App\Contracts\ServiceInterfaces\AchievementServiceInterface;
use App\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class AchievementGetController extends Controller
{
    /**
     * @param AchievementServiceInterface $achievementService
     */
    public function __construct(
        private AchievementServiceInterface $achievementService
    )
    {
        parent::__construct();
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $achievements = $this->achievementService->achievementsIndex();

        return $this->presenter->present($achievements, __('Successfully got data'), Response::HTTP_OK);
    }
}
