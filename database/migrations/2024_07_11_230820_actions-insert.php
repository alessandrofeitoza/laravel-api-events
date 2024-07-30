<?php

declare(strict_types=1);

use App\Models\Action;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const VALUES = [
        [
            'id' => 1,
            'name' => 'GET',
            'description' => 'Get',
        ],
        [
            'id' => 2,
            'name' => 'POST',
            'description' => 'Post',
        ],
        [
            'id' => 3,
            'name' => 'UPDATE',
            'description' => 'Update',
        ],
        [
            'id' => 4,
            'name' => 'DELETE',
            'description' => 'Delete',
        ],
    ];

    public function up(): void
    {
        foreach (self::VALUES as $item) {
            $object = new Action();
            $object->fill($item);

            $object->saveOrFail();
        }
    }

    public function down(): void
    {
        DB::table(Action::getTableName())->truncate();
    }
};
