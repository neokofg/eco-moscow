<?php

namespace App\Models\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserIndexResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'avatar_url' => $this->avatar_url,
            'fio' => $this->name . ' ' . $this->surname,
            'subscribers' => $this->subscribers()->count(),
        ];
    }
}
