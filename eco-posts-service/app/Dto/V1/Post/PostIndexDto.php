<?php

namespace App\Dto\V1\Post;

use App\Contracts\DtoContracts\V1\Post\PostIndexDtoContract;

final readonly class PostIndexDto extends PostIndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string|null $search
     */
    public function __construct(
        public int $first,
        public int $page,
        public ?string $search = null
    )
    {
        parent::__construct();
    }
}
