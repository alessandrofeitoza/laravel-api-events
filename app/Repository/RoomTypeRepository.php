<?php

declare(strict_types=1);

namespace App\Repository;

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
}
