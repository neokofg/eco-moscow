<?php

namespace App\Controllers\Rest\V1\Note;

use App\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final readonly class WallController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __invoke(): JsonResponse
    {

    }
}
