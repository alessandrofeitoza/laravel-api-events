<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\SpaceType;
use App\Repository\SpacetypeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SpaceTypeApiController extends ApiController
{
    public function __construct(private SpaceTypeRepository $repository) {
    }

    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            $this->repository->findAll()
        );
    }

    public function getOne(string $id): JsonResponse
    {
        return new JsonResponse(
            $this->repository->find((int)$id)
        );
    }

    public function create(Request $request): JsonResponse
    {
        $item = new SpaceType();
        $item->name = $request->get('name');
        $item->description = $request->get('description');

        $this->repository->save($item);

        return new JsonResponse($item, status: 201);
    }

    public function show(SpaceType $SpaceType): JsonResponse
    {
        return new JsonResponse(['show']);
    }

    public function update(Request $request, SpaceType $SpaceType): JsonResponse
    {
        return new JsonResponse(['update']);
    }

    public function destroy(SpaceType $SpaceType): JsonResponse
    {
        return new JsonResponse(['destroy']);
    }
}
