<?php

namespace App\Models\Resources\Video;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class VideoIndexResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $user = $this->user();

        return [
            'video_url' => $this->video_url,
            'title' => $this->title,
            'views' => $this->views,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
            ],
        ];
    }
}
