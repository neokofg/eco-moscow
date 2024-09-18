<?php

namespace App\Controllers\Rest\V1\NoteComment;

use App\Contracts\ServiceInterfaces\NoteCommentServiceInterface;
use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\NoteComment\NoteCommentReplyStoreRequest;
use App\Requests\Rest\V1\PostComment\PostCommentReplyStoreRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NoteCommentReplyStoreController extends Controller
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
     * @param NoteCommentReplyStoreRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(NoteCommentReplyStoreRequest $request): JsonResponse
    {
        $reply = $this->noteCommentService->noteCommentReplyStore($request->getDto());

        return $this->presenter->present($reply, __('Successfully created reply'), Response::HTTP_CREATED);
    }
}
