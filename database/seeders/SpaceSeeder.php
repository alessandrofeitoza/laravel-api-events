<?php

namespace Database\Seeders;

use App\Models\Space;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpaceSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'Digital College',
            'description' => 'Escola de Habilidades e Programas',
            'address' => 'Rua Vicente Leite, 2020',
        ],
        [
            'id' => 2,
            'name' => 'Infinity School',
            'description' => 'Escolas de Habilidades Infinitas',
            'address' => 'Av. Tristao Goncalves, 80',
        ],
        [
            'id' => 3,
            'name' => 'Microlins',
            'description' => 'Micro e pequenos aprendizados',
            'address' => 'online',
        ],
    ];

    public function run(): void
    {
        DB::table(Space::getTableName())->truncate();

        foreach (self::VALUES as $item) {
            $object = new Space();
            $object->fill($item);

            $object->saveOrFail();
        }
    }
}
