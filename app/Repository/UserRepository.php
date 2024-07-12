<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\User;

class UserRepository
{
    public function findAll(): iterable
    {
        return User::all();
    }

    public function save(User $user): void
    {
        $user->save();
    }

    public function find(string $id): User
    {
        $value = User::find($id);

        if (null === $value) {
            throw new ResourceNotFoundException();
        }

        return $value;
    }

    public function remove(string $id): void
    {
        $quantity = User::destroy($id);

        if (0 === $quantity) {
            throw new ResourceNotFoundException();
        }
    }
}
