<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\Profile;

class ProfileRepository
{
    public function findAll(): iterable
    {
        return Profile::all();
    }

    public function save(Profile $space): void
    {
        $space->save();
    }

    public function find(string $id): Profile
    {
        $value = Profile::find($id);

        if (null === $value) {
            throw new ResourceNotFoundException();
        }

        return $value;
    }

    public function remove(string $id): void
    {
        $quantity = Profile::destroy($id);

        if (0 === $quantity) {
            throw new ResourceNotFoundException();
        }
    }
}
