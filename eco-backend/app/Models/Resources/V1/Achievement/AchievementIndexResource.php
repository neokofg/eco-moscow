<?php

namespace App\Models\Resources\V1\Achievement;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

final class AchievementIndexResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'users_percentile' => ($this->users()->count() * 100) / User::all()->count(),
            'got' => Auth::guard('sanctum')->user()?->achievements()->where('achievements.id', $this->id)->exists(),
        ];
    }
}
