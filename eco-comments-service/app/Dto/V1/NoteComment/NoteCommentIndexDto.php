<?php

namespace App\Dto\V1\NoteComment;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentIndexDtoContract;

final readonly class NoteCommentIndexDto extends NoteCommentIndexDtoContract
{
    /**
     * @param int $first
     * @param int $page
     * @param string $note_id
     */
    public function __construct(
        public int $first,
        public int $page,
        public string $note_id,
    )
    {
        parent::__construct();
    }
}
