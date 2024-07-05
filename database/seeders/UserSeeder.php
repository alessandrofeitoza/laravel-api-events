<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private const VALUES = [
        [
            'id' => '1',
            'name' => 'Mariazinha',
            'email' => 'maria@email.com',
            'password' => '123456',
        ],
        [
            'id' => '2',
            'name' => 'Josefina',
            'email' => 'josefa@email.com',
            'password' => '654321',
        ],
    ];

    public function run(): void
    {
        foreach (self::VALUES as $item) {
            $user = new User();
            $user->fill($item);
            $user->saveOrFail();
        }
    }
}
