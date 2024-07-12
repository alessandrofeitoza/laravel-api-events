<?php

namespace Database\Seeders;

use App\Models\SpaceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpaceTypeSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'Nome teste',
            'address' => 'Rua São João, 123',
            'description' => 'Descricao teste',
        ],
        [
            'id' => 2,
            'name' => 'Nome teste 2',
            'address' => 'Rua São Jose, 456',
            'description' => 'Descricao teste 2',
        ],
        [
            'id' => 3,
            'name' => 'Nome teste 3',
            'address' => 'Rua São Joaquim, 789',
            'description' => 'Descricao teste 3',
        ],
    ];

    public function run(): void
    {
        DB::table(SpaceType::getTableName())->truncate();

        foreach (self::VALUES as $item) {
            $object = new SpaceType();
            $object->fill($item);

            $object->saveOrFail();
        }
    }
}
