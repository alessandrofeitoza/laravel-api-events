<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'Sala de Reunião',
            'description' => '',
        ],
        [
            'id' => 2,
            'name' => 'Sala de Aula',
            'description' => '',
        ],
        [
            'id' => 3,
            'name' => 'Laboratório',
            'description' => '',
        ],
    ];

    public function run(): void
    {
        DB::table(Room::getTableName())->truncate();
        DB::table(RoomType::getTableName())->delete();

        foreach (self::VALUES as $item) {
            $object = new RoomType();
            $object->fill($item);

            $object->saveOrFail();
        }
    }
}
