<?php

namespace App\Dto\V1\Post;

use App\Contracts\DtoContracts\V1\Post\PostIndexDtoContract;

final readonly class PostIndexDto extends PostIndexDtoContract
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
