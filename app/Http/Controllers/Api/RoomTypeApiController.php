<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\RoomType;
use App\Repository\RoomTypeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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

    public function create(Request $request): JsonResponse
    {
        $item = new RoomType();
        $item->name = $request->get('name');
        $item->description = $request->get('description');

        $this->repository->save($item);

        return new JsonResponse($item, status: 201);
    }

    public function show(RoomType $roomType): JsonResponse
    {
        return new JsonResponse(['show']);
    }

    public function update(Request $request, RoomType $roomType): JsonResponse
    {
        return new JsonResponse(['update']);
    }

    public function destroy(RoomType $roomType): JsonResponse
    {
        return new JsonResponse(['destroy']);
    }
}
