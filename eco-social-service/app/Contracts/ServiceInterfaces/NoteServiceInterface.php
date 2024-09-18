<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Note\WallDtoContract;

interface NoteServiceInterface
{
    /**
     * @param WallDtoContract $dto
     * @return mixed
     */
    public function wallIndex(WallDtoContract $dto): mixed;
}
