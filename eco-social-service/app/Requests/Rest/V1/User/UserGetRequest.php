<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\Dto;
use App\Dto\V1\User\UserGetDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class UserGetRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|ulid|exists:main_db.users,id'
        ];
    }

    /**
     * @return UserGetDto
     */
    public function getDto(): UserGetDto
    {
        $validated = $this->validated();
        return new UserGetDto(
            $validated['id']
        );
    }
}
