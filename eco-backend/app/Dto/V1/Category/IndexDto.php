<?php

namespace App\Dto\V1\Category;

use App\Contracts\DtoContracts\V1\Category\IndexDtoContract;

final readonly class IndexDto extends IndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string|null $search
     */
    public function __construct(
        public int      $first,
        public int      $page,
        public ?string  $search = null
    )
    {
        parent::__construct();
    }
}
