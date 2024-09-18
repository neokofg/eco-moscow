<?php

namespace App\Controllers\Rest\V1\Notes;

use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Note\NoteStoreRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteStoreController extends Controller
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
     * @param NoteStoreRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(NoteStoreRequest $request): JsonResponse
    {
        $note = $this->noteService->noteStore($request->getDto());

        return $this->presenter->present($note, __('Successfully created note'), Response::HTTP_CREATED);
    }
}
