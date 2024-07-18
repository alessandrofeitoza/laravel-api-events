<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\JsonResponse\NotFoundJsonResponse;
use App\Models\Event;
use App\Repository\EventRepository;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventApiController extends ApiController
{
    public function __construct(
        private EventRepository $repository
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
                $this->repository->find($id, true)
            );
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
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

    public function create(Request $request): JsonResponse
    {
        $event = new Event();
        $event->id = $request->get('id');
        $event->name = $request->get('name');
        $event->date = $request->get('date');
        $event->room_id = $request->get('room_id');
        $event->event_type_id = $request->get('event_type_id');

        $this->repository->save($event);

        return new JsonResponse($event, Response::HTTP_CREATED);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $event = $this->repository->find($id);
        $event->fill($request->all());

        $this->repository->save($event);

        return new JsonResponse($event);
    }
}
