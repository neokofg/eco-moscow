<?php

namespace App\Presenters;

use App\Models\NoteComment;
use App\Models\NoteCommentReply;
use App\Models\Resources\NoteComment\NoteCommentIndexResource;
use App\Models\Resources\NoteComment\NoteCommentReplyResource;
use App\Models\Resources\NoteComment\NoteCommentResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NoteCommentPresenter
{
    /**
     * @param NoteComment $noteComment
     * @return NoteCommentResource
     */
    public function present(NoteComment $noteComment): NoteCommentResource
    {
        return new NoteCommentResource($noteComment);
    }

    /**
     * @param LengthAwarePaginator $noteComments
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $noteComments): mixed
    {
        return NoteCommentIndexResource::collection($noteComments)->response()->getData();
    }

    /**
     * @param NoteCommentReply $reply
     * @return NoteCommentReplyResource
     */
    public function presentReply(NoteCommentReply $reply): NoteCommentReplyResource
    {
        return new NoteCommentReplyResource($reply);
    }
}
