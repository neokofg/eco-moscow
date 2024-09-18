<?php

namespace App\Requests\Rest\V1\NoteComment;

use App\Dto\V1\NoteComment\NoteCommentIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NoteCommentIndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:30',
            'page' => 'required|int|min:1',
            'note_id' => 'required|ulid|exists:notes,id',
        ];
    }

    /**
     * @return NoteCommentIndexDto
     */
    public function getDto(): NoteCommentIndexDto
    {
        $validated = $this->validated();

        return new NoteCommentIndexDto(
            $validated['first'],
            $validated['page'],
            $validated['note_id'],
        );
    }
}
