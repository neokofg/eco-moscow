<?php

namespace App\Presenters;

use App\Models\Resources\VideoComment\VideoCommentIndexResource;
use App\Models\Resources\VideoComment\VideoCommentReplyResource;
use App\Models\Resources\VideoComment\VideoCommentResource;
use App\Models\VideoComment;
use App\Models\VideoCommentReply;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class VideoCommentPresenter
{
    /**
     * @param VideoComment $videoComment
     * @return VideoCommentResource
     */
    public function present(VideoComment $videoComment): VideoCommentResource
    {
        return new VideoCommentResource($videoComment);
    }

    /**
     * @param LengthAwarePaginator $videoComments
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $videoComments): mixed
    {
        return VideoCommentIndexResource::collection($videoComments)->response()->getData();
    }

    /**
     * @param VideoCommentReply $reply
     * @return VideoCommentReplyResource
     */
    public function presentReply(VideoCommentReply $reply): VideoCommentReplyResource
    {
        return new VideoCommentReplyResource($reply);
    }
}
