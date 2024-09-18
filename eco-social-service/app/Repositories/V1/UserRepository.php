<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\User\SubscribersDtoContract;
use App\Contracts\DtoContracts\V1\User\SubscriptionsDtoContract;
use App\Contracts\DtoContracts\V1\User\UserGetDtoContract;
use App\Dto\V1\User\SubscribeDto;
use App\Dto\V1\User\SubscribersDto;
use App\Dto\V1\User\SubscriptionsDto;
use App\Dto\V1\User\UserGetDto;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class UserRepository extends Repository
{
    /**
     * @param User $user
     * @param SubscribeDto $dto
     * @return User
     */
    public function subscribe(User $user, SubscribeDto $dto): User
    {
        $user->subscriptions()->attach($dto->user_id);

        return $user;
    }

    /**
     * @param User $user
     * @param SubscribersDto|SubscribersDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function getSubscribers(User $user, SubscribersDto|SubscribersDtoContract $dto): LengthAwarePaginator
    {
        $subscribers = $user->subscribers();

        if (isset($dto->search)) {
            $subscribers->where(function ($query) use($dto){
                $query->where('name', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('surname', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $subscribers->paginate($dto->first,page: $dto->page)
            ->appends(['first' => $dto->first]);
    }

    /**
     * @param User $user
     * @param SubscriptionsDto|SubscriptionsDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function getSubscriptions(User $user, SubscriptionsDto|SubscriptionsDtoContract $dto): LengthAwarePaginator
    {
        $subscriptions = $user->subscriptions();

        if (isset($dto->search)) {
            $subscriptions->where(function ($query) use($dto){
                $query->where('name', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('surname', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $subscriptions->paginate($dto->first,page: $dto->page)
            ->appends(['first' => $dto->first]);
    }

    /**
     * @param UserGetDto|UserGetDtoContract $dto
     * @return User
     */
    public function userGet(UserGetDto|UserGetDtoContract $dto): User
    {
        return User::findOrFail($dto->id);
    }

    /**
     * @return Collection
     */
    public function recommendations(): Collection
    {
        return User::orderBy('created_at')->take(5)->get();
    }
}
