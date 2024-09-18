<?php

namespace App\Models\Resources\Video;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class VideoResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $user = $this->user();
        $category = $this->category();

        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'title' => $this->title,
            'description' => $this->description,
            'views' => $this->views,
            'video_url' => $this->video_url,
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
