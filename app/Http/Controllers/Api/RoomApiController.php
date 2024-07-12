<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\Room;
use App\Models\User;
use App\Repository\RoomRepository;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomApiController extends ApiController
{
    public function __construct(
        private RoomRepository $repository
    ) {
    }

    public function getAll(Request $request): JsonResponse
    {
        // TODO: pegar de auth
        $token = $request->headers->get('authorization');

        $user = User::query()->where(
            'remember_token',
            '=',
            $token
        )->first();

        if (null === $user) {
            return new JsonResponse(status: 403);
        }

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
        $file = $request->files;

        //  if (false === str_contains('png', $file->get('image_url')->getMimeType())) {
        //      die('arquivo invalido');
        //  }
        $id = $request->get('id');

        $imageName = $file->get('image_url')->getClientOriginalName();
        $imagePath = "photos/room_{$id}_{$imageName}"; // photos/room_123_festenha.png

        Storage::disk('public')->move(
            $file->get('image_url')->getRealPath(),
            dirname(__DIR__, 4).'/public/'.$imagePath
        );

        $room = new Room();
        $room->id = $id;
        $room->name = $request->get('name');
        $room->image_url = Storage::url($imagePath);
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
