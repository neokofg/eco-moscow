<?php

namespace App\Models\Resources\Marathon;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

final class MarathonIndexResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $user = $this->user();
        $category = $this->category();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'views' => $this->views,
            'image_url' => $this->image_url,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
            ],
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }
}
