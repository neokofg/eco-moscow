<?php

namespace App\Models\Resources\Promotion;

use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

final class PromotionResource extends JsonResource
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
            'sum_gathered' => $this->sum_gathered,
            'sum_needed' => $this->sum_needed,
            'created_at' => $this->created_at,
            'participators' => $this->participants()->count(),
            'participating' => Auth::guard('sanctum')->user()?->promotions()->where('promotion_id','=',$this->id)->exists(),
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
