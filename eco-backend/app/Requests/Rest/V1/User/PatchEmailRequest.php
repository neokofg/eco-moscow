<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\Dto;
use App\Dto\V1\User\PatchEmailDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class PatchEmailRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{new_email: string, current_password: string}
     */
    #[ArrayShape(['new_email' => "string", 'current_password' => "string"])]
    public function rules(): array
    {
        return [
            'new_email' => 'required|email|unique:users,email',
            'current_password' => 'required|min:6|max:30'
        ];
    }

    /**
     * @return PatchEmailDto
     */
    public function getDto(): PatchEmailDto
    {
        $validated = $this->validated();

        return new PatchEmailDto(
            $validated['new_email'],
            $validated['current_password']
        );
    }
}
