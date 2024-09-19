<?php

namespace App\Requests\Rest\V1\Event;

use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest implements RestRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first' => 'required|int|min:1',
            'page' => 'required|int|max:1',
            'search' => 'nullable|string|max:255',
            'user_id' => 'nullable|ulid|exists:main_db.users,id',
            'category_id' => 'nullable|ulid|exists:main_db.categories,id',
        ];
    }
}
