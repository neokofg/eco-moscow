<?php

namespace App\Requests\Rest\V1\PostComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PostCommentIndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:30',
            'page' => 'required|int|min:1',
            'post_id' => 'required|ulid|exists:posts,id',
        ];
    }

    /**
     * @return PostCommentIndexDto
     */
    public function getDto(): PostCommentIndexDto
    {
        $validated = $this->validated();

        return new PostCommentIndexDto(
            $validated['first'],
            $validated['page'],
            $validated['post_id'],
        );
    }
}
