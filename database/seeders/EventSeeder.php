<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventType;
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

        $roomTypeId = $this->getRoomTypeId();
        $eventTypeId = $this->getEventTypeId();
        foreach (self::VALUES as $data) {
            $event = new Event();
            $event->fill($data);
            $event->room_id = $roomTypeId;
            $event->event_type_id = $eventTypeId;

            $event->save();
        }
    }

    private function getRoomTypeId(): string
    {
        $roomType = $this->createRoomType();

        return $this->createRoom($roomType->id)->id;
    }

    private function getEventTypeId(): string
    {
        $eventType = new EventType();
        $eventType->id = 'bd993c8f-0fc4-476d-8153-08b220d1e738';
        $eventType->name = 'Encontro dos desenvolvedores Cansados';
        $eventType->save();
        return $eventType->id;
    }
    private function createRoomType(): RoomType
    {
        $roomType = new RoomType();
        $roomType->name = 'Auditorio';
        $roomType->description = 'Capacidade para 100 pessoas';
        $roomType->save();

        return $roomType;
    }

    private function createRoom(int $roomTypeId): Room
    {
        $room = new Room();
        $room->id = '22169527-a55f-4461-8c03-db59db61cec5';
        $room->name = 'Sala Especial';
        $room->image_url = 'https://www.opovo.com.br/_midias/jpg/2022/06/09/995x663/1_suite_quarto_vermelho_ela_e_ele_motel_maraponga-18936349.jpg';
        $room->room_type_id = $roomTypeId;
        $room->save();

        return $room;
    }
}
