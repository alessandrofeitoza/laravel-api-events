<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\Room;

class RoomRepository
{
    public function findAll(): iterable
    {
        return Room::all();
    }

    public function save(Room $room): void
    {
        $room->save();
    }

    public function find(string $id): Room
    {
        $value = Room::find($id);

        if (null === $value) {
            throw new ResourceNotFoundException();
        }

        return $value;
    }

    public function remove(string $id): void
    {
        $quantity = Room::destroy($id);

        if (0 === $quantity) {
            throw new ResourceNotFoundException();
        }
    }
}
