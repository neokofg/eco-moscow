<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\V1\User\PutDto;
use App\Helpers\RestRequest;
use App\Models\Enums\UserGenderEnum;
use Illuminate\Foundation\Http\FormRequest;

final class PutRequest extends FormRequest implements RestRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:35',
            'surname' => 'nullable|string|max:35',
            'gender' => 'nullable|in:male,female',
            'birthdate' => 'nullable|date_format:Y-m-d',
            'address' => 'nullable|string|max:300',
            'about' => 'nullable|string|max:500',
        ];
    }

    public function getDto(): PutDto
    {
        $validated = $this->validated();

        if (isset($validated['gender'])) {
            $validated['gender'] = UserGenderEnum::from($validated['gender']);
        }

        return new PutDto(
            ...$validated
        );
    }
}
