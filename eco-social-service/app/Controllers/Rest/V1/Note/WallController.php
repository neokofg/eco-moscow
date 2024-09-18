<?php

namespace App\Controllers\Rest\V1\Note;

use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Note\WallRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class WallController extends Controller
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
     * @param WallRequest $request
     * @return JsonResponse
     */
    public function __invoke(WallRequest $request): JsonResponse
    {
        $wall = $this->noteService->wallIndex($request->getDto());

        return $this->presenter->present($wall, __('Successfully got data'), Response::HTTP_OK);
    }
}
