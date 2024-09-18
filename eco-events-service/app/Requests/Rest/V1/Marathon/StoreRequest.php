<?php

namespace App\Requests\Rest\V1\Marathon;

use App\Helpers\RestRequest;
use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest implements RestRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'category_id' => 'required|ulid|exists:main_db.categories,id',
            'image_url' => 'required|url|max:255',
        ];
    }
}
