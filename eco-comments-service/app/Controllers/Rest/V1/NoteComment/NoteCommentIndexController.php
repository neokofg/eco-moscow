<?php

namespace App\Controllers\Rest\V1\NoteComment;

use App\Contracts\ServiceInterfaces\NoteCommentServiceInterface;
use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Controllers\Controller;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Requests\Rest\V1\NoteComment\NoteCommentIndexRequest;
use App\Requests\Rest\V1\PostComment\PostCommentIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteCommentIndexController extends Controller
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
     * @param NoteCommentIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(NoteCommentIndexRequest $request): JsonResponse
    {
        $posts = $this->noteCommentService->noteCommentIndex($request->getDto());

        return $this->presenter->present($posts, __('Successfully got data'), Response::HTTP_OK);
    }
}
