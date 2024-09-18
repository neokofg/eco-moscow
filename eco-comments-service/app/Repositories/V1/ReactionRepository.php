<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\Reactions\ReactionStoreDtoContract;
use App\Dto\V1\Reactions\ReactionStoreDto;
use App\Exceptions\Custom\Reactions\AlreadyReactionedException;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use App\Models\User;
use App\Models\VideoComment;
use App\Models\VideoCommentReply;
use App\Repositories\Repository;

final readonly class ReactionRepository extends Repository
{
    /**
     * @param User $user
     * @param ReactionStoreDto|ReactionStoreDtoContract $dto
     * @return Like|Dislike
     * @throws AlreadyReactionedException
     */
    public function reactionStore(User $user, ReactionStoreDto|ReactionStoreDtoContract $dto): Like|Dislike
    {
        $commentable = match ($dto->type->value) {
            'post_comment' => PostComment::class,
            'video_comment' => VideoComment::class,
            'post_comment_reply' => PostCommentReply::class,
            'video_comment_reply' => VideoCommentReply::class,
        };

        $this->reactionExists($user->id, $commentable, $dto->id);

        return match ($dto->reactionType->value) {
            'dislike' => Dislike::create([
                'user_id' => $user->id,
                'commentable_type' => $commentable,
                'commentable_id' => $dto->id,
            ]),
            'like' => Like::create([
                'user_id' => $user->id,
                'commentable_type' => $commentable,
                'commentable_id' => $dto->id,
            ]),
        };
    }

    /**
     * @param string $user_id
     * @param string $commentable
     * @param string $id
     * @return void
     * @throws AlreadyReactionedException
     */
    private function reactionExists(string $user_id, string $commentable, string $id): void
    {
        $conditions = [
            'user_id'          => $user_id,
            'commentable_type' => $commentable,
            'commentable_id'   => $id,
        ];

        if (
            Dislike::where($conditions)->exists() ||
            Like::where($conditions)->exists()
        ) {
            throw new AlreadyReactionedException();
        }
    }
}
