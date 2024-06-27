<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ResourceNotFoundException;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventRepository
{
    public function findAll(): iterable
    {
        $sql = "SELECT * FROM " . Event::getTableName();

        return DB::select($sql);
    }

    public function find(string $id, bool $withRelations = false): Event
    {
        $event = $withRelations === false ? Event::find($id) : Event::findOneWithRelations($id);

        if (null === $event) {
            throw new ResourceNotFoundException();
        }

        return $event;
    }

    public function remove(string $id): void
    {
        $count = Event::destroy($id);

        if (0 === $count) {
            throw new ResourceNotFoundException();
        }
    }

    public function save(Event $event): void
    {
        $event->save();
    }
}
