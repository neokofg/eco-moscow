<?php

namespace App\Requests\Rest\V1\Auth;

use App\Dto\V1\Auth\RegisterDto;
use App\Dto\V1\Auth\RegisterValidateDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class RegisterValidateRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{code: string, email: string}
     */
    #[ArrayShape(['code' => "string", 'email' => "string"])]
    public function rules(): array
    {
        return [
            'code' =>  'required|integer|digits:4',
            'email' => 'required|email|unique:users,email',
        ];
    }

    /**
     * @return RegisterValidateDto
     */
    public function getDto(): RegisterValidateDto
    {
        $validated = $this->validated();
        return new RegisterValidateDto(
            $validated['code'],
            $validated['email'],
        );
    }
}
