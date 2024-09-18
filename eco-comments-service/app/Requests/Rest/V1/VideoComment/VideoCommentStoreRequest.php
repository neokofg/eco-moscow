<?php

namespace App\Requests\Rest\V1\VideoComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentStoreDto;
use App\Dto\V1\VideoComment\VideoCommentStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class VideoCommentStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:255',
            'video_id' => 'required|ulid|exists:videos,id'
        ];
    }

    /**
     * @return VideoCommentStoreDto
     */
    public function getDto(): VideoCommentStoreDto
    {
        $validated = $this->validated();

        return new VideoCommentStoreDto(
            $validated['comment'],
            $validated['video_id']
        );
    }
}
