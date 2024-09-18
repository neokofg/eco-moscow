<?php

namespace App\Requests\Rest\V1\Auth;

use App\Dto\V1\Auth\LoginDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class LoginRequest extends FormRequest implements RestRequest
{
    /**
     * @return array{email: string, password: string}
     */
    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * @return LoginDto
     */
    public function getDto(): LoginDto
    {
        $validated = $this->validated();
        return new LoginDto(
            $validated['email'],
            $validated['password']
        );
    }
}
