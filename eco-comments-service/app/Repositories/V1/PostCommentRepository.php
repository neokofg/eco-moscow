<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentStoreDtoContract;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\PostComment\PostCommentReplyStoreDto;
use App\Dto\V1\PostComment\PostCommentStoreDto;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PostCommentRepository extends Repository
{
    /**
     * @param User $user
     * @param PostCommentStoreDto|PostCommentStoreDtoContract $dto
     * @return PostComment
     */
    public function postCommentStore(User $user, PostCommentStoreDto|PostCommentStoreDtoContract $dto): PostComment
    {
        return PostComment::create([
            'comment' => $dto->comment,
            'post_id' => $dto->post_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param PostCommentIndexDto|PostCommentIndexDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function postCommentIndex(PostCommentIndexDto|PostCommentIndexDtoContract $dto): LengthAwarePaginator
    {
        return PostComment::where('post_id','=',$dto->post_id)
            ->paginate($dto->first, page: $dto->page)
            ->appends(['first' => $dto->first]);
    }

    /**
     * @param User $user
     * @param PostCommentReplyStoreDto|PostCommentReplyStoreDtoContract $dto
     * @return PostCommentReply
     */
    public function postCommentReplyStore(User $user, PostCommentReplyStoreDto|PostCommentReplyStoreDtoContract $dto): PostCommentReply
    {
        return PostCommentReply::create([
            'comment' => $dto->comment,
            'post_comment_id' => $dto->post_comment_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}
