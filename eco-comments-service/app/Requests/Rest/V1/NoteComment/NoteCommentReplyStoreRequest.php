<?php

namespace App\Requests\Rest\V1\NoteComment;

use App\Dto\V1\NoteComment\NoteCommentReplyStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NoteCommentReplyStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'note_comment_id' => 'required|string|exists:mongodb.note_comments,_id',
            'comment' => 'required|string|max:255',
        ];
    }

    /**
     * @return NoteCommentReplyStoreDto
     */
    public function getDto(): NoteCommentReplyStoreDto
    {
        $validated = $this->validated();

        return new NoteCommentReplyStoreDto(
            $validated['note_comment_id'],
            $validated['comment']
        );
    }
}
