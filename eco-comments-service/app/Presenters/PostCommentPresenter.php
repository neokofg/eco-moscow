<?php

namespace App\Presenters;

use App\Models\PostComment;
use App\Models\PostCommentReply;
use App\Models\Resources\PostComment\PostCommentIndexResource;
use App\Models\Resources\PostComment\PostCommentReplyResource;
use App\Models\Resources\PostComment\PostCommentResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PostCommentPresenter
{
    /**
     * @param PostComment $postComment
     * @return PostCommentResource
     */
    public function present(PostComment $postComment): PostCommentResource
    {
        return new PostCommentResource($postComment);
    }

    /**
     * @param LengthAwarePaginator $postComments
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $postComments): mixed
    {
        return PostCommentIndexResource::collection($postComments)->response()->getData();
    }

    /**
     * @param PostCommentReply $reply
     * @return PostCommentReplyResource
     */
    public function presentReply(PostCommentReply $reply): PostCommentReplyResource
    {
        return new PostCommentReplyResource($reply);
    }
}
