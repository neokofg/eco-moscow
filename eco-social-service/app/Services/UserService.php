<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\User\SubscribeDtoContract;
use App\Contracts\DtoContracts\V1\User\SubscribersDtoContract;
use App\Contracts\DtoContracts\V1\User\SubscriptionsDtoContract;
use App\Contracts\DtoContracts\V1\User\UserGetDtoContract;
use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Dto\V1\User\SubscribeDto;
use App\Dto\V1\User\SubscribersDto;
use App\Dto\V1\User\SubscriptionsDto;
use App\Dto\V1\User\UserGetDto;
use App\Models\Resources\User\UserResource;
use App\Presenters\UserPresenter;
use App\Repositories\V1\UserRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class UserService implements UserServiceInterface
{
    /**
     * @param UserRepository $userRepository
     * @param UserPresenter $userPresenter
     */
    public function __construct(
        private UserRepository $userRepository,
        private UserPresenter $userPresenter
    )
    {
    }

    /**
     * @param SubscribeDto|SubscribeDtoContract $dto
     * @return UserResource
     * @throws AuthenticationException
     */
    public function subscribe(SubscribeDto|SubscribeDtoContract $dto): UserResource
    {
        $user = $this->userRepository->subscribe(getUser(), $dto);

        return $this->userPresenter->present($user);
    }

    /**
     * @param SubscribersDto|SubscribersDtoContract $dto
     * @return mixed
     * @throws AuthenticationException
     */
    public function getSubscribers(SubscribersDto|SubscribersDtoContract $dto): mixed
    {
        $subscribers = $this->userRepository->getSubscribers(getUser(), $dto);

        return $this->userPresenter->presentIndex($subscribers);
    }

    /**
     * @param SubscriptionsDto|SubscriptionsDtoContract $dto
     * @return mixed
     * @throws AuthenticationException
     */
    public function getSubscriptions(SubscriptionsDto|SubscriptionsDtoContract $dto): mixed
    {
        $subscriptions = $this->userRepository->getSubscriptions(getUser(), $dto);

        return $this->userPresenter->presentIndex($subscriptions);
    }

    /**
     * @param UserGetDto|UserGetDtoContract $dto
     * @return UserResource
     */
    public function userGet(UserGetDto|UserGetDtoContract $dto): UserResource
    {
        $user = $this->userRepository->userGet($dto);

        return $this->userPresenter->present($user);
    }

    /**
     * @return mixed
     */
    public function recommendations(): mixed
    {
        $users = $this->userRepository->recommendations();

        return $this->userPresenter->presentIndex($users);
    }
}
