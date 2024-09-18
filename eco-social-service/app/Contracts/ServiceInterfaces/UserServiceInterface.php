<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\User\SubscribeDtoContract;
use App\Contracts\DtoContracts\V1\User\SubscribersDtoContract;
use App\Contracts\DtoContracts\V1\User\SubscriptionsDtoContract;
use App\Contracts\DtoContracts\V1\User\UserGetDtoContract;
use App\Models\Resources\User\UserResource;
use Illuminate\Auth\AuthenticationException;

interface UserServiceInterface
{
    /**
     * @param SubscribeDtoContract $dto
     * @return UserResource
     */
    public function subscribe(SubscribeDtoContract $dto): UserResource;

    /**
     * @param SubscribersDtoContract $dto
     * @return mixed
     * @throws AuthenticationException
     */
    public function getSubscribers(SubscribersDtoContract $dto): mixed;

    /**
     * @param SubscriptionsDtoContract $dto
     * @return mixed
     * @throws AuthenticationException
     */
    public function getSubscriptions(SubscriptionsDtoContract $dto): mixed;

    /**
     * @param UserGetDtoContract $dto
     * @return UserResource
     */
    public function userGet(UserGetDtoContract $dto): UserResource;

    /**
     * @return mixed
     */
    public function recommendations(): mixed;
}
