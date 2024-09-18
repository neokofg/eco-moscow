<?php

namespace App\Dto\V1\PostComment;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentStoreDtoContract;

final readonly class PostCommentStoreDto extends PostCommentStoreDtoContract
{
    /**
     * @param string $comment
     * @param string $post_id
     */
    public function __construct(
        public string $comment,
        public string $post_id
    )
    {
        parent::__construct();
    }
}
