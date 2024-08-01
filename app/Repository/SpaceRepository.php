<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\Space;

class SpaceRepository
{
    public function findAll(): iterable
    {
        return Space::all();
    }

    public function save(Space $space): void
    {
        $space->save();
    }

    public function find(string $id): Space
    {
        $value = Space::find($id);

        if (null === $value) {
            throw new ResourceNotFoundException();
        }

        return $value;
    }

    public function remove(string $id): void
    {
        $quantity = Space::destroy($id);

        if (0 === $quantity) {
            throw new ResourceNotFoundException();
        }
    }
}
