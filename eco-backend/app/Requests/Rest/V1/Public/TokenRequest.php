<?php

namespace App\Requests\Rest\V1\Public;

use App\Dto\V1\Public\TokenDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class TokenRequest extends FormRequest implements RestRequest
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
     * @return \App\Dto\V1\Public\TokenDto
     */
    public function getDto(): TokenDto
    {
        $validated = $this->validated();
        return new TokenDto(
            $validated['token'],
        );
    }
}
