<?php

namespace App\Requests\Rest\V1\Note;

use App\Dto\Dto;
use App\Dto\V1\Note\NoteStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NoteStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'image_url' => 'required|url|max:255',
            'category_id' => 'required|ulid|exists:main_db.categories,id',
            'content' => 'required|string|max:5000'
        ];
    }

    /**
     * @return NoteStoreDto
     */
    public function getDto(): NoteStoreDto
    {
        $validated = $this->validated();

        return new NoteStoreDto(
            $validated['title'],
            $validated['image_url'],
            $validated['category_id'],
            $validated['content']
        );
    }
}
