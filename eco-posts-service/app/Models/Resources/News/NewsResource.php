<?php

namespace App\Models\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class NewsResource extends JsonResource
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
            'content' => $this->content,
            'views' => $this->views,
            'image_url' => $this->image_url,
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }
}
