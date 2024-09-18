<?php

namespace App\Controllers\Grpc\Controllers;

use App\Controllers\Grpc\Clients\AchievementClient;
use App\Models\Achievement;
use App\Models\User;
use GRPC\Achievement\AchievementServiceInterface;
use GRPC\Achievement\AddAchievementRequest;
use Spiral\RoadRunner\GRPC\Context;

final readonly class AchievementController
{
    /**
     * @param AchievementServiceInterface $client
     */
    public function __construct(private AchievementClient $client) {}

    /**
     * @return void
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
