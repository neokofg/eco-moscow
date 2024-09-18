<?php

namespace App\Controllers\Rest\V1\Notes;

use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteGetController extends Controller
{
    /**
     * @param NoteServiceInterface $noteService
     */
    public function __construct(
        private NoteServiceInterface $noteService
    )
    {
        parent::__construct();
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        try {
            $note = $this->noteService->noteGet($id);
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('Note not found'), Response::HTTP_NOT_FOUND);
        }
        return $this->presenter->present($note, __('Successfully got note'), Response::HTTP_OK);
    }
}
