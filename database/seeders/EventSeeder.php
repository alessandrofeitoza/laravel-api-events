<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => '36932cbe-ae61-440b-808f-566fb3df2781',
            'name' => 'PHP com Rapadura',
            'date' => '2024-06-22 08:30:00'
        ],
        [
            'id' => 'c6768361-426d-489e-bd92-c3fe278b5930',
            'name' => 'Carnaval do Paracuru',
            'date' => '2024-02-10 14:00:00'
        ],
        [
            'id' => 'c9e8eba2-3a96-427d-b02c-f0bc03a2d2ad',
            'name' => 'Encontro dos seniores de 2 anos',
            'date' => '2024-09-22 08:30:00'
        ],
    ];

    public function run(): void
    {
        DB::table(Event::getTableName())->truncate();

        $roomType = new RoomType();
        $roomType->name = 'Auditorio';
        $roomType->description = 'Capacidade para 100 pessoas';
        $roomType->save();

        $room = new Room();
        $room->id = '56ea4e1c-e071-4b20-8bfb-3b9ed02803e5';
        $room->name = 'Sala Especial';
        $room->roomTypeId = $roomType->id;

        foreach (self::VALUES as $data) {
            $event = new Event();
            $event->fill($data);
            $event->room_id = $room->id;

            $event->save();
        }
    }
}
