<?php

namespace App\Requests\Rest\V1\Category;

use App\Dto\V1\Category\IndexDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest implements  RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:50',
            'page' => 'nullable|int|min:1',
            'search' => 'nullable|string|max:255'
        ];
    }

    /**
     * @return IndexDto
     */
    public function getDto(): IndexDto
    {
        $validated = $this->validated();

        if (!isset($validated['page'])) {
            $validated['page'] = 1;
        }

        return new IndexDto(
            ...$validated
        );
    }
}
