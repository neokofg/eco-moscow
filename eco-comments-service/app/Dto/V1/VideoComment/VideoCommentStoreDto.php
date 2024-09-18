<?php

namespace App\Dto\V1\VideoComment;


use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentStoreDtoContract;

final readonly class VideoCommentStoreDto extends VideoCommentStoreDtoContract
{
    /**
     * @param string $comment
     * @param string $video_id
     */
    public function __construct(
        public string $comment,
        public string $video_id
    )
    {
        parent::__construct();
    }
}
