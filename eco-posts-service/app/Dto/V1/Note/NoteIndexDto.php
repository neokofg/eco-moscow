<?php

namespace App\Dto\V1\Note;

use App\Contracts\DtoContracts\V1\Note\NoteIndexDtoContract;

final readonly class NoteIndexDto extends NoteIndexDtoContract
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
