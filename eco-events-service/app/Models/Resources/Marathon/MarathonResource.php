<?php

namespace App\Models\Resources\Marathon;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

final class MarathonResource extends JsonResource
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
            'created_at' => $this->created_at,
            'participators' => $this->participants()->count(),
            'participating' => Auth::guard('sanctum')->user()?->marathons()->where('volunteering_id','=',$this->id)->exists(),
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
