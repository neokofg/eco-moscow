<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\V1\User\PutDto;
use App\Helpers\RestRequest;
use App\Models\Enums\UserGenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class PutRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:35',
            'surname' => 'nullable|string|max:35',
            'gender' => 'nullable|in:male,female',
            'birthdate' => 'nullable|date_format:Y-m-d',
            'address' => 'nullable|string|max:300',
            'about' => 'nullable|string|max:500',
            'avatar_url' => 'nullable|url',
            'user_education' => 'nullable|array',
            'user_education.university' => 'nullable|string',
            'user_education.speciality' => 'nullable|string',
            'user_education.start_year' => 'nullable|numeric|digits:4|min:1900|max:'.now()->format('Y'),
            'user_education.end_year' => 'nullable|numeric|digits:4|min:1900|max:2050|gt:user_education.start_year',
            'user_education.for_now' => 'nullable|bool',
            'categories' => 'nullable|array',
            'categories.*' => 'ulid|exists:categories,id',
            'organizer' => 'nullable|array',
            'organizer.company' => 'nullable|string',
            'organizer.inn' => 'nullable|string',
            'organizer.ogrn' => 'nullable|string',
            'organizer.kpp' => 'nullable|string',
            'organizer.okpo' => 'nullable|string',
        ];
    }

    /**
     * @return PutDto
     */
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
