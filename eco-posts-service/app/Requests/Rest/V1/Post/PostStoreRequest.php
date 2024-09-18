<?php

namespace App\Requests\Rest\V1\Post;

use App\Dto\V1\Post\PostStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PostStoreRequest extends FormRequest implements RestRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|ulid|exists:main_db.categories,id',
            'content' => 'required|string|max:5000'
        ];
    }

    public function getDto(): PostStoreDto
    {
        $validated = $this->validated();
        return new PostStoreDto(
            $validated['title'],
            $validated['category_id'],
            $validated['content']
        );
    }
}
