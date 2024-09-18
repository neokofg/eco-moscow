<?php

namespace App\Controllers\Rest\V1\NoteComment;

use App\Contracts\ServiceInterfaces\NoteCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\NoteComment\NoteCommentStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteCommentStoreController extends Controller
{
    /**
     * @param NoteCommentServiceInterface $noteCommentService
     */
    public function __construct(
        private NoteCommentServiceInterface $noteCommentService
    )
    {
        parent::__construct();
    }

    /**
     * @param NoteCommentStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(NoteCommentStoreRequest $request): JsonResponse
    {
        $post = $this->noteCommentService->noteCommentStore($request->getDto());

        return $this->presenter->present($post, __('Successfully created comment'), Response::HTTP_CREATED);
    }
}
