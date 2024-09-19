<?php

namespace App\Requests\Rest\V1\Promotion;

use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class DonateRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'sum' => 'required|int',
        ];
    }
}
