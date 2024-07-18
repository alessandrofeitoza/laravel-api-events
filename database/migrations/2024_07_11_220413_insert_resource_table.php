<?php

declare(strict_types=1);

use App\Models\Resource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'Event',
            'description' => 'Eventos',
        ],
        [
            'id' => 2,
            'name' => 'EventType',
            'description' => 'Tipo de eventos',
        ],
        [
            'id' => 3,
            'name' => 'Room',
            'description' => 'Salas',
        ],
        [
            'id' => 4,
            'name' => 'RoomType',
            'description' => 'Tipo de salas',
        ],
        [
            'id' => 5,
            'name' => 'Space',
            'description' => 'Espaços',
        ],
        [
            'id' => 6,
            'name' => 'User',
            'description' => 'Usuários do sistema',
        ],
    ];

    public function up(): void
    {
       foreach (self::VALUES as $item) {
           $object = new Resource();
           $object->fill($item);

           $object->saveOrFail();
        }
    }

    public function down(): void
    {
        DB::table(Resource::getTableName())->truncate();
    }
};
