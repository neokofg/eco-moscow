<?php

namespace App\Dto\V1\Video;

use App\Contracts\DtoContracts\V1\Video\VideoIndexDtoContract;

final readonly class VideoIndexDto extends VideoIndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string|null $search
     * @param string|null $user_id
     * @param string|null $category_id
     */
    public function __construct(
        public int $first,
        public int $page,
        public ?string $search = null,
        public ?string $user_id = null,
        public ?string $category_id = null,
    )
    {
        parent::__construct();
    }
}
