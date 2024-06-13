<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\RoomType;

class RoomTypeRepository
{
    public function findAll(): iterable
    {
        return RoomType::all();
    }

    public function save(RoomType $roomType): void
    {
        $roomType->save();
    }

    public function find(int $id): RoomType
    {
        $value = RoomType::find($id);

        if (null === $value) {
            throw new ResourceNotFoundException();
        }

        return $value;
    }

    public function remove(int $id): void
    {
        $quantity = RoomType::destroy($id);

        if (0 === $quantity) {
            throw new ResourceNotFoundException();
        }
    }
}
