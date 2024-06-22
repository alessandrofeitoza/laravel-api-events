<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Exception\ResourceNotFoundException;
use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\RoomType;
use App\Repository\RoomTypeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomTypeApiController extends ApiController
{
    public function __construct(private RoomTypeRepository $repository) {
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
        } catch (ResourceNotFoundException) {
            return new NotFoundJsonResponse();
        }
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->repository->remove((int) $id);

            return new JsonResponse(status: Response::HTTP_NO_CONTENT);
        } catch (ResourceNotFoundException) {
            return new NotFoundJsonResponse();
        }
    }

    public function create(Request $request): JsonResponse
    {
        $item = new RoomType();
        $item->name = $request->get('name');
        $item->description = $request->get('description');

        $this->repository->save($item);

        return new JsonResponse($item, status: 201);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $roomType = $this->repository->find((int) $id);
        $roomType->name = $request->get('name');
        $roomType->description = $request->get('description');

        $this->repository->save($roomType);

        return new JsonResponse($roomType);
    }
}
