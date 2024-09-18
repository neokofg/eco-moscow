<?php

namespace App\Requests\Rest\V1\PostComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\PostComment\PostCommentReplyStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PostCommentReplyStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'post_comment_id' => 'required|string|exists:mongodb.post_comments,_id',
            'comment' => 'required|string|max:255',
        ];
    }

    /**
     * @return PostCommentReplyStoreDto
     */
    public function getDto(): PostCommentReplyStoreDto
    {
        $validated = $this->validated();

        return new PostCommentReplyStoreDto(
            $validated['post_comment_id'],
            $validated['comment']
        );
    }
}
