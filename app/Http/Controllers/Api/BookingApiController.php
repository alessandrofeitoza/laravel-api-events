<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookingApiController extends ApiController
{
    public function __construct(private BookingRepository $bookingRepository)
    {
    }

    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            $this->bookingRepository->findAll()
        );
    }
}
