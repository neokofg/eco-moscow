<?php

namespace App\Requests\Rest\V1\VideoComment;

use App\Dto\Dto;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\VideoComment\VideoCommentIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class VideoCommentIndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:30',
            'page' => 'required|int|min:1',
            'video_id' => 'required|ulid|exists:videos,id',
        ];
    }

    /**
     * @return VideoCommentIndexDto
     */
    public function getDto(): VideoCommentIndexDto
    {
        $validated = $this->validated();

        return new VideoCommentIndexDto(
            $validated['first'],
            $validated['page'],
            $validated['video_id'],
        );
    }
}
