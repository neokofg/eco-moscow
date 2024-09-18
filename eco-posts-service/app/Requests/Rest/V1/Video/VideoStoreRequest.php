<?php

namespace App\Requests\Rest\V1\Video;

use App\Dto\Dto;
use App\Dto\V1\Video\VideoStoreDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class VideoStoreRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|ulid|exists:main_db.categories,id',
            'video_url' => 'required|url|max:255',
            'description' => 'nullable|string|max:2000'
        ];
    }

    /**
     * @return VideoStoreDto
     */
    public function getDto(): VideoStoreDto
    {
        $validated = $this->validated();

        return new VideoStoreDto(
            ...$validated
        );
    }
}
