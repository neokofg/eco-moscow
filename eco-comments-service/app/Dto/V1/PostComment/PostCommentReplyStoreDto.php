<?php

namespace App\Dto\V1\PostComment;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentReplyStoreDtoContract;

final readonly class PostCommentReplyStoreDto extends PostCommentReplyStoreDtoContract
{
    public function __construct(
        public string $post_comment_id,
        public string $comment
    )
    {
        parent::__construct();
    }
}
