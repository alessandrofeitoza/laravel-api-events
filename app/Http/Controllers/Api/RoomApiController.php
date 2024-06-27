<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\Room;
use App\Repository\RoomRepository;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomApiController extends ApiController
{
    public function __construct(
        private RoomRepository $repository
    ) {}

    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            Room::findAll(join: true)
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
        $room = new Room();
        $room->id = $request->get('id');
        $room->name = $request->get('name');
        $room->room_type_id = $request->get('room_type_id');

        $this->repository->save($room);

        return new JsonResponse($room, status: 201);
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
        $room = $this->repository->find($id);
        $room->name = $request->get('name');
        $room->room_type_id = $request->get('room_type_id');

        $this->repository->save($room);

        return new JsonResponse($room);
    }
}
