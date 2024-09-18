<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\Dto;
use App\Dto\V1\User\PatchPasswordDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class PatchPasswordRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{old_password: string, new_password: string}
     */
    #[ArrayShape(['old_password' => "string", 'new_password' => "string"])]
    public function rules(): array
    {
        return [
            'old_password' => 'required|min:6|max:30',
            'new_password' => 'required|min:6|max:30',
        ];
    }

    /**
     * @return PatchPasswordDto
     */
    public function getDto(): PatchPasswordDto
    {
        $validated = $this->validated();

        return new PatchPasswordDto(
            $validated['old_password'],
            $validated['new_password']
        );
    }
}
