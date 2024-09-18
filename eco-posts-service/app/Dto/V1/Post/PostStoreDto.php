<?php

namespace App\Dto\V1\Post;

use App\Contracts\DtoContracts\V1\Post\PostStoreDtoContract;

final readonly class PostStoreDto extends PostStoreDtoContract
{
    /**
     * @param string $title
     * @param string $category_id
     * @param string $content
     */
    public function __construct(
        public string $title,
        public string $category_id,
        public string $content
    )
    {
        parent::__construct();
    }
}
