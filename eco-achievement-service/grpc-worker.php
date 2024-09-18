<?php

use GRPC\Achievement\AchievementServiceInterface;
use App\AchievementService;
use Spiral\RoadRunner\GRPC\Invoker;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;

require 'vendor/autoload.php';

$server = new Server(new Invoker(), [
    'debug' => false, // optional (default: false)
]);
$server->registerService(AchievementServiceInterface::class, new AchievementService());
$worker = Worker::create();
$server->serve($worker);
