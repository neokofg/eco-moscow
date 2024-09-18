<?php

namespace App\Presenters;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Resources\Reactions\ReactionResource;

final class ReactionPresenter
{
    /**
     * @param Like|Dislike $reaction
     * @return ReactionResource
     */
    public function present(Like|Dislike $reaction): ReactionResource
    {
        return new ReactionResource($reaction);
    }
}
