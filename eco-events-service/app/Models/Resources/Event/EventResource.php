<?php

namespace App\Models\Resources\Event;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

final class EventResource extends JsonResource
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
            'address' => $this->address,
            'image_url' => $this->image_url,
            'created_at' => $this->created_at,
            'participators' => $this->participants()->count(),
            'location' => $this->location->getY() . ',' . $this->location->getX(),
            'participating' => Auth::guard('sanctum')->user()?->events()->where('event_id','=',$this->id)->exists(),
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
