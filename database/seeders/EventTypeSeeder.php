<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'Encontro de comunidades',
        ],
        [
            'id' => 2,
            'name' => 'Encontro de amigos',
        ],
        [
            'id' => 3,
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
