<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Note\NoteIndexDtoContract;
use App\Contracts\DtoContracts\V1\Note\NoteStoreDtoContract;
use App\Dto\V1\Note\NoteIndexDto;
use App\Dto\V1\Note\NoteStoreDto;
use App\Models\Resources\Note\NoteResource;
use Illuminate\Auth\AuthenticationException;

interface NoteServiceInterface
{
    /**
     * @param NoteStoreDtoContract $dto
     * @return NoteResource
     * @throws AuthenticationException
     */
    public function noteStore(NoteStoreDtoContract $dto): NoteResource;

    /**
     * @param NoteIndexDtoContract $dto
     * @return mixed
     */
    public function noteIndex(NoteIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return NoteResource
     */
    public function noteGet(string $id): NoteResource;
}
