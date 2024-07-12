<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\SpaceType;

class SpaceTypeRepository
{
    public function findAll(): iterable
    {
        return SpaceType::all();
    }

    public function save(SpaceType $roomType): void
    {
        $roomType->save();
    }

    public function find(int $id): SpaceType
    {
        $value = SpaceType::find($id);

        if(null == $value){
            throw new ResourceNotFoundException();
        }

        return $value;
    }
}
