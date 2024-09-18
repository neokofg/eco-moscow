<?php

namespace App\Models\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'avatar_url' => $this->avatar_url,
            'name' => $this->name,
            'surname' => $this->surname,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'about' => $this->about,
            'gender' => $this->gender,
            'email' => $this->email,
            'updated_at' => $this->updated_at,
            'user_education' => $this->userEducation,
            'achievements' => $this->achievements
        ];
    }
}
