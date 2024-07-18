<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\EventType;
use Illuminate\Support\Facades\DB;

class EventTypeRepository
{
    public function findAll(): iterable
    {
        $sql = 'SELECT * FROM '.EventType::getTableName();

        return DB::select($sql);
    }

    public function find(string $id): EventType
    {
        $eventType = EventType::find($id);

        if (null === $eventType) {
            throw new ResourceNotFoundException();
        }

        return $eventType;
    }

    public function delete(string $id): void
    {
        $count = EventType::destroy($id);

        if (0 === $count) {
            throw new ResourceNotFoundException();
        }
    }

    public function save(EventType $eventType): void
    {
        $eventType->save();
    }
}
