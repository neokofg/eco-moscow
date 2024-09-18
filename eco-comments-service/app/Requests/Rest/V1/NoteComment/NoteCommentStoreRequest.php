<?php

namespace App\Requests\Rest\V1\NoteComment;

use App\Dto\V1\NoteComment\NoteCommentStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NoteCommentStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:255',
            'note_id' => 'required|ulid|exists:notes,id'
        ];
    }

    /**
     * @return NoteCommentStoreDto
     */
    public function getDto(): NoteCommentStoreDto
    {
        $validated = $this->validated();

        return new NoteCommentStoreDto(
            $validated['comment'],
            $validated['note_id']
        );
    }
}
