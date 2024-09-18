<?php

namespace App\Requests\Rest\V1\News;

use App\Dto\Dto;
use App\Dto\V1\News\NewsIndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class NewsIndexRequest extends FormRequest implements RestRequest
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
            'category_id' => 'nullable|ulid|exists:main_db.categories,id',
        ];
    }

    /**
     * @return NewsIndexDto
     */
    public function getDto(): NewsIndexDto
    {
        $validated = $this->validated();

        if(!isset($validated['page'])) {
            $validated['page'] = 1;
        }

        return new NewsIndexDto(
            ...$validated
        );
    }
}
