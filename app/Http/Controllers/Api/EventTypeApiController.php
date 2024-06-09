<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\EventType;
use App\Repository\EventTypeRepository;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTypeApiController extends ApiController
{
    public function __construct(private EventTypeRepository $repository)
    {
    }

    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            $this->repository->findAll()
        );
    }

    public function getOne(string $id): JsonResponse
    {
        try {
            return new JsonResponse(
                $this->repository->find((int) $id)
            );
        } catch (Exception $exception) {
            return new NotFoundJsonResponse();
        }
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->repository->delete((int) $id);

            return new JsonResponse(status: Response::HTTP_NO_CONTENT);
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
    }

    public function create(Request $request): JsonResponse
    {
        $eventType = new EventType();
        $eventType->name = $request->get('name');

        $this->repository->save($eventType);

        return new JsonResponse($eventType, Response::HTTP_CREATED);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $eventType = $this->repository->find((int) $id);
        $eventType->name = $request->get('name');

        $this->repository->save($eventType);

        return new JsonResponse($eventType);
    }
}
