<?php

namespace App\Models\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'avatar_url' => $this->avatar_url,
            'name' => $this->name,
            'surname' => $this->surname,
            'birthdate' => $this->birthdate,
            'about' => $this->about,
            'gender' => $this->gender,
            'subscribers' => $this->subscribers()->count(),
            'subscriptions' => $this->subscriptions()->count()
        ];
    }
}
