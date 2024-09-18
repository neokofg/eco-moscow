<?php

namespace App\Models\Resources\PostComment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PostCommentIndexResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $user = $this->user;

        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $user->avatar_url,
            ],
            'created_at' => $this->created_at,
            'likes' => $this->likes()->count(),
            'dislikes' => $this->dislikes()->count(),
            'replies' => $this->replies
        ];
    }
}
