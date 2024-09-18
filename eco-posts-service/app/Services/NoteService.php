<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\Note\NoteIndexDtoContract;
use App\Contracts\DtoContracts\V1\Note\NoteStoreDtoContract;
use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Dto\V1\Note\NoteIndexDto;
use App\Dto\V1\Note\NoteStoreDto;
use App\Models\Resources\Note\NoteResource;
use App\Presenters\NotePresenter;
use App\Repositories\V1\NoteRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class NoteService implements NoteServiceInterface
{
    /**
     * @param NoteRepository $noteRepository
     * @param NotePresenter $notePresenter
     */
    public function __construct(
        private NoteRepository $noteRepository,
        private NotePresenter $notePresenter
    )
    {
    }

    /**
     * @param NoteStoreDto|NoteStoreDtoContract $dto
     * @return NoteResource
     * @throws AuthenticationException
     */
    public function noteStore(NoteStoreDto|NoteStoreDtoContract $dto): NoteResource
    {
        $note = $this->noteRepository->noteStore(getUser(), $dto);

        return $this->notePresenter->present($note);
    }

    /**
     * @param NoteIndexDto|NoteIndexDtoContract $dto
     * @return mixed
     */
    public function noteIndex(NoteIndexDto|NoteIndexDtoContract $dto): mixed
    {
        $notes = $this->noteRepository->noteIndex($dto);

        return $this->notePresenter->presentIndex($notes);
    }

    /**
     * @param string $id
     * @return NoteResource
     */
    public function noteGet(string $id): NoteResource
    {
        $note = $this->noteRepository->noteGet($id);

        return $this->notePresenter->present($note);
    }
}
