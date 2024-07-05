<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class RoomSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => '164d7662-9311-4d7a-a556-c75bbef45b31',
            'name' => 'Jeff Bezos',
        ],
        [
            'id' => '0c4bf853-48a0-42a2-92b8-4c01698b0910',
            'name' => 'Quarto 02',
        ],
        [
            'id' => '56ea4e1c-e071-4b20-8bfb-3b9ed02803e5',
            'name' => 'Sala Especial',
        ],
    ];

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(Room::getTableName())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roomType = new RoomType();
        $roomType->name = 'Auditorio';
        $roomType->description = 'Capacidade para 100 pessoas';
        $roomType->save();

        foreach (self::VALUES as $item) {
            $object = new Room();
            $object->fill($item);
            $object->room_type_id = $roomType->id;
            $object->image_url = 'https://www.opovo.com.br/_midias/jpg/2022/06/09/995x663/1_suite_quarto_vermelho_ela_e_ele_motel_maraponga-18936349.jpg';
            $object->saveOrFail();
        }
    }
}
