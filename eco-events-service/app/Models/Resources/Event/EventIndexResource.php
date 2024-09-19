<?php

namespace App\Models\Resources\Event;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

final class EventIndexResource extends JsonResource
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
            'content' => Str::limit($this->content,300, '...'),
            'views' => $this->views,
            'address' => $this->address,
            'image_url' => $this->image_url,
            'location' => $this->location->getY() . ',' . $this->location->getX(),
            'created_at' => $this->created_at,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
                'subscribers' => $user->subscribers()->count(),
            ],
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }
}
