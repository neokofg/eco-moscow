<?php

namespace App\Requests\Rest\V1\Note;

use App\Dto\Dto;
use App\Dto\V1\Note\NoteIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NoteIndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|integer|min:1|max:30',
            'page' => 'nullable|integer|min:1',
            'search' => 'nullable|string|max:255'
        ];
    }

    /**
     * @return NoteIndexDto
     */
    public function getDto(): NoteIndexDto
    {
        $validated = $this->validated();

        if(!isset($validated['page'])) {
            $validated['page'] = 1;
        }

        return new NoteIndexDto(
            ...$validated
        );
    }
}
