<?php

namespace App\Controllers\Rest\V1\Notes;

use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Note\NoteIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteIndexController extends Controller
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
     * @param NoteIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(NoteIndexRequest $request): JsonResponse
    {
        $notes = $this->noteService->noteIndex($request->getDto());

        return $this->presenter->present($notes, __('Successfully got data'), Response::HTTP_OK);
    }
}
