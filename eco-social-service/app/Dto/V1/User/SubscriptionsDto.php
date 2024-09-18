<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\SubscriptionsDtoContract;

final readonly class SubscriptionsDto extends SubscriptionsDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string|null $search
     */
    public function __construct(
        public int $first,
        public int $page,
        public ?string $search
    )
    {
        parent::__construct();
    }
}
