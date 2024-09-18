<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\Note\WallDtoContract;
use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Dto\V1\Note\WallDto;
use App\Presenters\NotePresenter;
use App\Repositories\V1\NoteRepository;

final readonly class NoteService implements NoteServiceInterface
{
    public function __construct(
        private NoteRepository $noteRepository,
        private NotePresenter $notePresenter
    )
    {
    }

    /**
     * @param WallDto|WallDtoContract $dto
     * @return mixed
     */
    public function wallIndex(WallDto|WallDtoContract $dto): mixed
    {
        $notes = $this->noteRepository->wallGet($dto);

        return $this->notePresenter->presentIndex($notes);
    }
}
