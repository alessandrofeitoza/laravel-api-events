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

    public function delete(string $id): JsonResponse
    {
        try {
            $this->bookingRepository->remove((int) $id);

            return new JsonResponse(status: Response::HTTP_NO_CONTENT);
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
    }
}
