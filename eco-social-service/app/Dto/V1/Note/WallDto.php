<?php

namespace App\Dto\V1\Note;

use App\Contracts\DtoContracts\V1\Note\WallDtoContract;

final readonly class WallDto extends WallDtoContract
{
    /**
     * @param int $first
     * @param int $page
     */
    public function __construct(
        public int $first,
        public int $page,
    )
    {
        parent::__construct();
    }
}
