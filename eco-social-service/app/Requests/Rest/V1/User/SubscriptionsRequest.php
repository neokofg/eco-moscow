<?php

namespace App\Requests\Rest\V1\User;

use App\Dto\V1\User\SubscriptionsDto;
use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class SubscriptionsRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1|max:30',
            'page' => 'nullable|int|min:1',
            'search' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return SubscriptionsDto
     */
    public function getDto(): SubscriptionsDto
    {
        $validated = $this->validated();

        if(!isset($validated['page'])) {
            $validated['page'] = 1;
        }

        return new SubscriptionsDto(
            ...$validated
        );
    }
}
