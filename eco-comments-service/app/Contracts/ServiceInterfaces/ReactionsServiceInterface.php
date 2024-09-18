<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Reactions\ReactionStoreDtoContract;
use App\Models\Resources\Reactions\ReactionResource;

interface ReactionsServiceInterface
{
    /**
     * @param ReactionStoreDtoContract $dto
     * @return ReactionResource
     */
    public function reactionStore(ReactionStoreDtoContract $dto): ReactionResource;
}
