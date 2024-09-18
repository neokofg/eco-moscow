<?php

namespace App\Dto\V1\VideoComment;

use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentReplyStoreDtoContract;

final readonly class VideoCommentReplyStoreDto extends VideoCommentReplyStoreDtoContract
{
    public function __construct(
        public string $video_comment_id,
        public string $comment
    )
    {
        parent::__construct();
    }
}
