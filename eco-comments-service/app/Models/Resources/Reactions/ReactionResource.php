<?php

namespace App\Models\Resources\Reactions;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ReactionResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $user = $this->user;
        return [
            'id' => $this->id,
            'type' => get_class($this->resource),
            'user' => [
                'id' => $user->id,
                'fio' => $user->name . ' ' . $user->surname,
                'avatar_url' => $this->avatar_url
            ],
            'commentable_type' => $this->commentable_type,
            'commentable_id' => $this->commentable_id
        ];
    }
}
