<?php

declare(strict_types=1);

namespace App\Http\JsonResponse;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NotFoundJsonResponse extends JsonResponse
{
    public function __construct(string $message = 'Resource not found', int $status = Response::HTTP_NOT_FOUND)
    {
        parent::__construct([
            'error' => $message,
        ], $status);
    }
}
