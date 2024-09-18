<?php

namespace App\Exceptions\Custom;

use App\Exceptions\BaseException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use App\Exceptions\Custom\QueryException as CustomQueryException;
use Symfony\Component\HttpFoundation\Response;

final class ServiceUnavailableException extends BaseException
{
    /**
     * @param $previous
     * @throws CustomQueryException
     * @throws AuthorizationException;
     */
    public function __construct(
        $previous = null
    )
    {
        if ($previous instanceof AuthorizationException) {
            throw new AuthorizationException();
        }

        if ($previous instanceof QueryException) {
            throw new CustomQueryException($previous->getMessage());
        }

        if ($previous != null) {
            $code = $previous->getCode();
            if (isHttpCode($code)) {
                $this->code = $previous->getCode();
            } else {
                $this->code = Response::HTTP_SERVICE_UNAVAILABLE;
            }
            $this->message = $previous->getMessage();
        } else {
            $this->message = __('Service unavailable');
            $this->code = Response::HTTP_SERVICE_UNAVAILABLE;
        }
    }
}
