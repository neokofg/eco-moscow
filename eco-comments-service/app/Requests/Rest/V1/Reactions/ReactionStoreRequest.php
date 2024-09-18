<?php

namespace App\Requests\Rest\V1\Reactions;

use App\Dto\Dto;
use App\Dto\V1\Reactions\ReactionStoreDto;
use App\Helpers\RestRequest;
use App\Models\Enums\ReactionableEnum;
use App\Models\Enums\ReactionTypeEnum;
use App\Traits\ValidateIdTrait;
use Illuminate\Foundation\Http\FormRequest;

final class ReactionStoreRequest extends FormRequest implements RestRequest
{
    use ValidateIdTrait;

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:post_comment,video_comment,post_comment_reply,video_comment_reply',
            'id' => 'required|string',
            'reaction_type' => 'required|in:like,dislike',
        ];
    }

    /**
     * @return ReactionStoreDto
     */
    public function getDto(): ReactionStoreDto
    {
        $validated = $this->validated();
        switch ($validated['type']) {
            case 'post_comment':
                $this->validatePostCommentId($validated['id']);
                break;
            case 'video_comment':
                $this->validateVideoCommentId($validated['id']);
                break;
            case 'post_comment_reply':
                $this->validatePostCommentReplyId($validated['id']);
                break;
            case 'video_comment_reply':
                $this->validateVideoCommentReplyId($validated['id']);
                break;
        }

        return new ReactionStoreDto(
            ReactionableEnum::from($validated['type']),
            ReactionTypeEnum::from($validated['reaction_type']),
            $validated['id']
        );
    }
}
