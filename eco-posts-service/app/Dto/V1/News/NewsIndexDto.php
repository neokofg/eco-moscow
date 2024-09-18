<?php

namespace App\Dto\V1\News;

use App\Contracts\DtoContracts\V1\News\NewsIndexDtoContract;

final readonly class NewsIndexDto extends NewsIndexDtoContract
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
