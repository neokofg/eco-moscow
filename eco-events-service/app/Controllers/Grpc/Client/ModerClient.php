<?php

namespace App\Controllers\Grpc\Client;

use Grpc\BaseStub;
use GRPC\Moder\ModerRequest;
use GRPC\Moder\ModerResponse;
use GRPC\Moder\ModerServiceInterface;
use Spiral\RoadRunner\GRPC\ContextInterface;

final class ModerClient extends BaseStub implements ModerServiceInterface
{
    public function PredictModer(ContextInterface $ctx, ModerRequest $in): ModerResponse
    {
        [$response, $status] = $this->_simpleRequest(
            '/' . self::NAME . '/PredictModer',
            $in,
            [ModerResponse::class, 'decode'],
            (array) $ctx->getValue('metadata'),
            (array) $ctx->getValue('options'),
        )->wait();

        return $response;
    }
}
