<?php

namespace App\Controllers\Grpc\Controller;

use App\Controllers\Grpc\Client\AchievementClient;
use App\Models\MainDb\Achievement;
use App\Models\User;
use GRPC\Achievement\AchievementServiceInterface;
use GRPC\Achievement\AddAchievementRequest;
use Spiral\RoadRunner\GRPC\Context;

final readonly class AchievementController
{
    /**
     * @param AchievementClient $client
     */
    public function __construct(private AchievementServiceInterface $client) {}

    /**
     * @param User $user
     * @param string $key
     * @return bool
     */
    public function addAchievement(User $user, string $key): bool
    {
        $achievement = Achievement::where('key', $key)->firstOrFail();

        $request = new AddAchievementRequest();
        $request->setAchievementId($achievement->id);
        $request->setUserId($user->id);

        $response = $this->client->AddAchievement(
            new Context([]),
            $request,
        );

        return $response->getSuccess();
    }
}
