<?php

namespace App\Dto\V1\Video;

use App\Contracts\DtoContracts\V1\Video\VideoStoreDtoContract;

final readonly class VideoStoreDto extends VideoStoreDtoContract
{
    /**
     * @param string $name
     * @param string $category_id
     * @param string $video_url
     * @param string $preview_url
     * @param string|null $description
     */
    public function __construct(
        public string $name,
        public string $category_id,
        public string $video_url,
        public string $preview_url,
        public ?string $description = null
    )
    {
        parent::__construct();
    }
}
