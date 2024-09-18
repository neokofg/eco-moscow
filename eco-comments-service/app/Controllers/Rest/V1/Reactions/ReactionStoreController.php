<?php

namespace App\Controllers\Rest\V1\Reactions;

use App\Contracts\ServiceInterfaces\ReactionsServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Reactions\AlreadyReactionedException;
use App\Requests\Rest\V1\Reactions\ReactionStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class ReactionStoreController extends Controller
{
    /**
     * @param ReactionsServiceInterface $reactionsService
     */
    public function __construct(
        private ReactionsServiceInterface $reactionsService
    )
    {
        parent::__construct();
    }

    /**
     * @param ReactionStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(ReactionStoreRequest $request): JsonResponse
    {
        try {
            $reaction = $this->reactionsService->reactionStore($request->getDto());
        } catch (AlreadyReactionedException $exception) {
            return $this->presenter->present(false, __('You already reactioned'), Response::HTTP_FORBIDDEN);
        }
        return $this->presenter->present($reaction, __('Successfully created reaction'), Response::HTTP_CREATED);
    }
}
