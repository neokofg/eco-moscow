<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\SubscribeDtoContract;

final readonly class SubscribeDto extends SubscribeDtoContract
{
    /**
     * @param string $user_id
     */
    public function __construct(
        public string $user_id
    )
    {
        parent::__construct();
    }
}
