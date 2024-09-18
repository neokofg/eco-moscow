<?php

namespace App\Dto\V1\VideoComment;

use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentIndexDtoContract;

final readonly class VideoCommentIndexDto extends VideoCommentIndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string $video_id
     */
    public function __construct(
        public int $first,
        public int $page,
        public string $video_id,
    )
    {
        parent::__construct();
    }
}
