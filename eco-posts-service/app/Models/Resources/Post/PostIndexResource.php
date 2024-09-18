<?php

namespace App\Models\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

final class PostIndexResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $user = $this->user();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => Str::limit($this->content, 200, '...'),
            'image_url' => 'thumb',
            'created_at' => $this->created_at,
            'views' => $this->views,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
            ]
        ];
    }
}
