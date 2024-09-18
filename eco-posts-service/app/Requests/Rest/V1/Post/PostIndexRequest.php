<?php

namespace App\Requests\Rest\V1\Post;

use App\Dto\Dto;
use App\Dto\V1\Post\PostIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PostIndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|integer|min:1|max:30',
            'page' => 'nullable|integer|min:1',
            'search' => 'nullable|string|max:255',
            'user_id' => 'nullable|ulid|exists:main_db.users,id',
            'category_id' => 'nullable|ulid|exists:main_db.categories,id',
        ];
    }

    /**
     * @return PostIndexDto
     */
    public function getDto(): PostIndexDto
    {
        $validated = $this->validated();

        if(!isset($validated['page'])) {
            $validated['page'] = 1;
        }

        return new PostIndexDto(
            ...$validated
        );
    }
}
