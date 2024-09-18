<?php

namespace App\Dto\V1\PostComment;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentIndexDtoContract;

final readonly class PostCommentIndexDto extends PostCommentIndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string $post_id
     */
    public function __construct(
        public int $first,
        public int $page,
        public string $post_id,
    )
    {
        parent::__construct();
    }
}
