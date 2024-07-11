<?php

declare(strict_types=1);

use App\Models\Action;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $actions = new Action();

        $actions->post([
            'name' => 'Post',
            'description' => 'Create a new resource',
        ]);

        $actions->get([
            'name' => 'Get',
            'description' => 'Read a resource',
        ]);

        $actions->put([
            'name' => 'Update',
            'description' => 'Update a resource',
        ]);

        $actions->delete([
            'name' => 'Delete',
            'description' => 'Delete a resource'
        ]);

        $actions->save();
    }

    public function down(): void
    {
        Action::where('name', 'Post')->delete();
        Action::where('name', 'Get')->delete();
        Action::where('name', 'Update')->delete();
        Action::where('name', 'Delete')->delete();
    }
};
