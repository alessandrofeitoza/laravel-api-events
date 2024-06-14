<?php

declare(strict_types=1);

use App\Models\EventType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(EventType::getTableName(), function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table(EventType::getTableName(), function (Blueprint $table) {
            $table->addColumn('CHAR', 'id', [
                'length' => 36,
            ]);
        });


        $dados = EventType::all();

        foreach ($dados as $cada) {
            $id = Uuid::uuid4();
            $cada->id = $id;
        }

        //UPDATE event_types SET id='1234';

        Schema::table(EventType::getTableName(), function (Blueprint $table) {
            $table->uuid('id')->primary()->change();
        });
    }

    public function down(): void
    {

    }
};
