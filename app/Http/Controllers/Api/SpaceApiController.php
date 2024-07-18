<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\Space;
use App\Repository\SpaceRepository;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SpaceApiController extends ApiController
{
    public function __construct(
        private SpaceRepository $repository
    ) {
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
                $this->repository->find($id)
            );
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
    }

    public function create(Request $request): JsonResponse
    {
        $space = new Space();
        $space->name = $request->get('name');
        $space->address = $request->get('address');
        $space->description = $request->get('description');

        $this->repository->save($space);

        return new JsonResponse($space, status: 201);
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->repository->remove($id);

            return new JsonResponse(status: Response::HTTP_NO_CONTENT);
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $space = $this->repository->find($id);
        $space->name = $request->get('name') ?? $space->name;
        $space->address = $request->get('address') ?? $space->address;
        $space->description = $request->get('description') ?? $space->description;

        $this->repository->save($space);

        return new JsonResponse($space);
    }
}
