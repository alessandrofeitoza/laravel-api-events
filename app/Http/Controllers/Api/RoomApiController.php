<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RoomApiController extends ApiController
{
    public function getAll(): JsonResponse
    {
        return new JsonResponse(
            Room::all()
        );
    }

    public function create(Request $request): JsonResponse
    {
        $item = new Room();
        $item->id = $request->get('id');
        $item->name = $request->get('name');

        $item->save();

        return new JsonResponse($item, status: 201);
    }
}
