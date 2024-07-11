<?php

use App\Models\Resource;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private const VALUES = [
        [
            'id' => '1',
            'name' => 'Event',
            'description' => 'Entidade Event'
        ],
        [
            'id' => '2',
            'name' => 'EventType',
            'description' => 'Entidade EventType'
        ],
        [
            'id' => '3',
            'name' => 'Room',
            'description' => 'Entidade Room'
        ],
        [
            'id' => '4',
            'name' => 'RoomType',
            'description' => 'Entidade RoomType'
        ],
        [
            'id' => '5',
            'name' => 'Space',
            'description' => 'Entidade Space'
        ],
        [
            'id' => '6',
            'name' => 'User',
            'description' => 'Entidade User'
        ],
    ];

    public function up(): void
    {
        foreach (self::VALUES as $data) {
            $model = new Resource();
            $model->id = $data['id'];
            $model->name = $data['name'];
            $model->description = $data['description'];
            $model->save();
        }
    }

    public function down(): void
    {
        
    }
};
