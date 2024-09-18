<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

final readonly class JsonPresenter
{
    /**
     * @param $data
     * @param $message
     * @param $code
     * @return JsonResponse
     */
    public function present($data, $message, $code): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $code);
    }
}
