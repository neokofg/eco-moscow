<?php

namespace App\Controllers\Grpc\Controller;

use GRPC\Moder\ModerRequest;
use GRPC\Moder\ModerServiceInterface;
use Spiral\RoadRunner\GRPC\Context;

final readonly class ModerController
{
    /**
     * @param ModerServiceInterface $client
     */
    public function __construct(private ModerServiceInterface $client)
    {
    }

    /**
     * @param string $input
     * @return bool
     */
    public function moder(string $input): bool
    {
        $request = new ModerRequest();
        $request->setText($input);

        $response = $this->client->PredictModer(
            new Context([]),
            $request,
        );

        return $response->getIsTrue();
    }
}
