<?php

namespace App\Models\Resources\Event;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

final class EventIndexResource extends JsonResource
{
    public function toArray(Request $request)
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
            'location' => $this->location->x . ',' . $this->location->y,
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
