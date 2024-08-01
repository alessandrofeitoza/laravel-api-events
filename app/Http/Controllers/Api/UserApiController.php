<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Exception\ResourceNotFoundException;
use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserApiController extends ApiController
{
    public function __construct(
        private UserRepository $repository
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
        $item = new User();
        $item->name = $request->get('name');
        $item->email = $request->get('email');
        $item->password = $request->get('password');

        $this->repository->save($item);

        return new JsonResponse($item, status: 201);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $user = $this->repository->find((int) $id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $this->repository->save($user);

        return new JsonResponse($user);
    }
}
