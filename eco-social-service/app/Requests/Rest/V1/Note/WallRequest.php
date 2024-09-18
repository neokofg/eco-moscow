<?php

namespace App\Requests\Rest\V1\Note;

use App\Dto\Dto;
use App\Dto\V1\Note\WallDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class WallRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:30',
            'page' => 'required|int|min:1',
        ];
    }

    /**
     * @return WallDto
     */
    public function getDto(): WallDto
    {
        $validated = $this->validated();

        return new WallDto(
            $validated['first'],
            $validated['page'],
        );
    }
}
