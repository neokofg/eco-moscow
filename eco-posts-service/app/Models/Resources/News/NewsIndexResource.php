<?php

namespace App\Models\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

final class NewsIndexResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $category = $this->category();

        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'header' => $this->header,
            'content' => Str::limit($this->content, 200, '...'),
            'image_url' => $this->image_url,
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }
}
