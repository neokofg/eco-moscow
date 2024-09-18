<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use GRPC\Achievement\AchievementServiceInterface;
use GRPC\Achievement\AddAchievementRequest;
use GRPC\Achievement\AddAchievementResponse;
use Spiral\RoadRunner\GRPC\ContextInterface;

final class AchievementService implements AchievementServiceInterface
{
    /**
     * @param ContextInterface $ctx
     * @param AddAchievementRequest $in
     * @return AddAchievementResponse
     * @throws Exception
     */
    public function AddAchievement(ContextInterface $ctx, AddAchievementRequest $in): AddAchievementResponse
    {
        $userId = $in->getUserId();
        $achievementId = $in->getAchievementId();

        $connection = new AMQPStreamConnection(
            'rabbitmq',
            '5672',
            'guest',
            'guest'
        );

        $channel = $connection->channel();

        $channel->queue_declare('achievements', false, true, false, false);

        $messageBody = json_encode([
            'user_id' => $userId,
            'achievement_id' => $achievementId,
        ]);

        $msg = new AMQPMessage($messageBody);
        $channel->basic_publish($msg, '', 'achievements');

        $channel->close();
        $connection->close();

        $response = new AddAchievementResponse();
        $response->setSuccess(true);

        return $response;
    }
}