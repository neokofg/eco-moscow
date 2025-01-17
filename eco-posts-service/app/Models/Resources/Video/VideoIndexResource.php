<?php

namespace App\Models\Resources\Video;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class VideoIndexResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $user = $this->user();

        return [
            'video_url' => $this->video_url,
            'title' => $this->title,
            'views' => $this->views,
            'preview_url' => $this->preview_url,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
            ],
        ];
    }
}
