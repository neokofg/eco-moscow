<?php

namespace App\Requests\Rest\V1\Auth\User;

use App\Dto\V1\Auth\User\RegisterValidateDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class RegisterValidateRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{token: string}
     */
    #[ArrayShape(['token' => "string"])]
    public function rules(): array
    {
        return [
            'token' =>  'required|string',
        ];
    }

    /**
     * @return RegisterValidateDto
     */
    public function getDto(): RegisterValidateDto
    {
        $validated = $this->validated();
        return new RegisterValidateDto(
            $validated['token'],
        );
    }
}
