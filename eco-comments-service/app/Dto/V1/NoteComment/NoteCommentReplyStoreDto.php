<?php

namespace App\Dto\V1\NoteComment;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentReplyStoreDtoContract;

final readonly class NoteCommentReplyStoreDto extends NoteCommentReplyStoreDtoContract
{
    /**
     * @param string $note_comment_id
     * @param string $comment
     */
    public function __construct(
        public string $note_comment_id,
        public string $comment
    )
    {
        parent::__construct();
    }
}
