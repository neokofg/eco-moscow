<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\Dto;
use App\Dto\V1\User\PatchPasswordDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class PatchPasswordRequest extends FormRequest implements RestRequest
{
    public function rules(): array
    {
        return [
            'old_password' => 'required|min:6|max:30',
            'new_password' => 'required|min:6|max:30',
        ];
    }

    public function getDto(): PatchPasswordDto
    {
        $validated = $this->validated();

        return new PatchPasswordDto(
            $validated['old_password'],
            $validated['new_password']
        );
    }
}
