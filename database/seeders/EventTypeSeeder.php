<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class EventTypeSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => 'ae6b3f97-d25a-4132-95a2-9717d9f332e5',
            'name' => 'Encontro de comunidades',
        ],
        [
            'id' => '90d822d3-47fb-47cd-929d-536c67902e3d',
            'name' => 'Encontro de amigos',
        ],
        [
            'id' => '03c7b747-2037-4f7f-9535-ef1074855a1d',
            'name' => 'Racha de lei',
        ],
    ];

    public function run(): void
    {
        DB::table(EventType::getTableName())->truncate();

        foreach (self::VALUES as $data) {
            $item = new EventType();
            $item->fill($data);

            $item->save();
        }
    }
}
