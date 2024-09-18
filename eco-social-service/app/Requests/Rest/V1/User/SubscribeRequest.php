<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\Dto;
use App\Dto\V1\User\SubscribeDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class SubscribeRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:main_db.users,id'
        ];
    }

    /**
     * @return SubscribeDto
     */
    public function getDto(): SubscribeDto
    {
        $validated = $this->validated();

        return new SubscribeDto(
            $validated['user_id']
        );
    }
}
