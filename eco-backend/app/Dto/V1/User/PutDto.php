<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\PutDtoContract;
use App\Dto\Dto;
use App\Models\Enums\UserGenderEnum;
use App\Traits\FilterDataTrait;

final readonly class PutDto extends PutDtoContract
{
    use FilterDataTrait;
    public function __construct(
        public ?string $name = null,
        public ?string $surname = null,
        public ?UserGenderEnum $gender = null,
        public ?string $birthdate = null,
        public ?string $address = null,
        public ?string $about = null,
        public ?string $avatar_url = null,
        public ?array  $user_education = null,
        public ?array  $categories = null,
        public ?array  $organizer = null,
    )
    {
        parent::__construct();
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'surname' => $this->surname,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'about' => $this->about,
            'avatar_url' => $this->avatar_url,
        ];

        return $this->filterData($data);
    }
}
