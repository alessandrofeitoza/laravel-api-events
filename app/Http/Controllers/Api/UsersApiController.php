<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\User;
use App\Repository\UserRepository;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends ApiController
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            User::findAll()
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
        $user = new User();
        $user->id = $request->get('id');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $this->repository->save($user);

        return new JsonResponse($user, status: 201);
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
        $user = $this->repository->find($id);
        $user->name = $request->get('name');
        $user->name = $request->get('email');
        $user->name = $request->get('password');

        $this->repository->save($user);

        return new JsonResponse($user);
    }
}
