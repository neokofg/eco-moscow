<?php

namespace App\Requests\Rest\V1\VideoComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\PostComment\PostCommentReplyStoreDto;
use App\Dto\V1\VideoComment\VideoCommentReplyStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class VideoCommentReplyStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'video_comment_id' => 'required|string|exists:mongodb.video_comments,_id',
            'comment' => 'required|string|max:255',
        ];
    }

    /**
     * @return VideoCommentReplyStoreDto
     */
    public function getDto(): VideoCommentReplyStoreDto
    {
        $validated = $this->validated();

        return new VideoCommentReplyStoreDto(
            $validated['video_comment_id'],
            $validated['comment']
        );
    }
}
