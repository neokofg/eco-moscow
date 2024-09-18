<?php

namespace App\Requests\Rest\V1\Auth\BusinessUser;

use App\Dto\V1\Auth\BusinessUser\RegisterDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class RegisterRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{name: string, email: string, password: string}
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:35',
            'email' => 'required|email|unique:business_users,email',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * @return RegisterDto
     */
    public function getDto(): RegisterDto
    {
        $validated = $this->validated();
        return new RegisterDto(
            $validated['name'],
            $validated['email'],
            $validated['password']
        );
    }
}
