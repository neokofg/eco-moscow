<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Achievement;
use App\Models\User;
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection(
    'rabbitmq',
    '5672',
    'guest',
    'guest'
);

$channel = $connection->channel();

$channel->queue_declare('achievements', false, true, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    $data = json_decode($msg->body, true);

    $userId = $data['user_id'];
    $achievementId = $data['achievement_id'];

    $user = User::find($userId);
    $achievement = Achievement::find($achievementId);

    if ($user && $achievement) {
        try {
            $user->achievements()->attach($achievement);
            echo " [x] Achievement {$achievementId} assigned to user {$userId}\n";
        } catch (Throwable $e) {
            echo " [!] Achievement can't be attached\n";
        }
    } else {
        echo " [!] User or Achievement not found\n";
    }
    $msg->ack();
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume('achievements', '', false, false, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();
