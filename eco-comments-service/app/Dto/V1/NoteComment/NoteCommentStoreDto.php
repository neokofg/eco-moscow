<?php

namespace App\Dto\V1\NoteComment;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentStoreDtoContract;

final readonly class NoteCommentStoreDto extends NoteCommentStoreDtoContract
{
    /**
     * @param string $comment
     * @param string $note_id
     */
    public function __construct(
        public string $comment,
        public string $note_id
    )
    {
        parent::__construct();
    }
}
