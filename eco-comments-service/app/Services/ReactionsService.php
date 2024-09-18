<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\Reactions\ReactionStoreDtoContract;
use App\Contracts\ServiceInterfaces\ReactionsServiceInterface;
use App\Dto\V1\Reactions\ReactionStoreDto;
use App\Exceptions\Custom\Reactions\AlreadyReactionedException;
use App\Models\Resources\Reactions\ReactionResource;
use App\Presenters\ReactionPresenter;
use App\Repositories\V1\ReactionRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class ReactionsService implements ReactionsServiceInterface
{
    public function __construct(
        private ReactionRepository $reactionRepository,
        private ReactionPresenter $reactionPresenter
    )
    {
    }

    /**
     * @param ReactionStoreDto|ReactionStoreDtoContract $dto
     * @return ReactionResource
     * @throws AuthenticationException
     * @throws AlreadyReactionedException
     */
    public function reactionStore(ReactionStoreDto|ReactionStoreDtoContract $dto): ReactionResource
    {
        $reaction = $this->reactionRepository->reactionStore(getUser(), $dto);

        return $this->reactionPresenter->present($reaction);
    }
}
