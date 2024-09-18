<?php

namespace App\Requests\Rest\V1\PostComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PostCommentStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:255',
            'post_id' => 'required|ulid|exists:posts,id'
        ];
    }

    /**
     * @return PostCommentStoreDto
     */
    public function getDto(): PostCommentStoreDto
    {
        $validated = $this->validated();

        return new PostCommentStoreDto(
            $validated['comment'],
            $validated['post_id']
        );
    }
}
