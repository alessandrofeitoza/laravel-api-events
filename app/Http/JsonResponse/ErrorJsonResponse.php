<?php

declare(strict_types=1);

namespace App\Http\JsonResponse;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ErrorJsonResponse extends JsonResponse
{
    public function __construct(string $message, int $status = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct([
            'error' => $message,
        ], $status);
    }
}
