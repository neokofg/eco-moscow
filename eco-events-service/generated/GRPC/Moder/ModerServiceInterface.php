<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: protos/moder.proto

namespace GRPC\Moder;

use Spiral\RoadRunner\GRPC;

interface ModerServiceInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "moder.ModerService";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ModerRequest $in
    * @return ModerResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function PredictModer(GRPC\ContextInterface $ctx, ModerRequest $in): ModerResponse;
}
