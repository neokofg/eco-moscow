<?php

namespace App\Controllers\Grpc\Client;

use GRPC\Achievement\AchievementServiceInterface;
use GRPC\Achievement\AddAchievementRequest;
use GRPC\Achievement\AddAchievementResponse;
use Grpc\BaseStub;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\ContextInterface;

final class AchievementClient extends BaseStub implements AchievementServiceInterface
{
    /**
     * @param ContextInterface $ctx
     * @param AddAchievementRequest $in
     * @return AddAchievementResponse
     */
    public function AddAchievement(GRPC\ContextInterface $ctx, AddAchievementRequest $in): AddAchievementResponse
    {
        [$response, $status] = $this->_simpleRequest(
            '/' . self::NAME . '/AddAchievement',
            $in,
            [AddAchievementResponse::class, 'decode'],
            (array) $ctx->getValue('metadata'),
            (array) $ctx->getValue('options'),
        )->wait();

        return $response;
    }
}

