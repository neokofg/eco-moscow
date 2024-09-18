<?php

namespace App\Models\Resources\Note;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class NoteResource extends JsonResource
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
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' .  $user->surname,
                'avatar_url' => $user->avatar_url
            ],
            'created_at' => $this->created_at
        ];
    }
}
