<?php

declare(strict_types=1);

use App\Models\EventType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    public function up(): void
    {
        return;
        //solucao para tabelas relacionadas
        /*Schema::table(EventType::getTableName(), function (Blueprint $table) {
            $table->addColumn('CHAR', 'id_novo', [
                'length' => 36,
            ])->nullable(true);
        });

        Schema::table(Event::getTableName(), function (Blueprint $table) {
            $table->addColumn('CHAR', 'event_type_id_novo', [
                'length' => 36,
            ])->nullable(true);
        });

        foreach (EventType::all() as $eventType) {
            $uuid = Uuid::uuid4();

            DB::update("
                UPDATE event_types SET id_novo='{$uuid}' WHERE id='{$eventType->id}'
            ");

            DB::update("
                UPDATE events SET event_type_id_novo='{$uuid}' WHERE event_type_id='{$eventType->id}'
            ");
        }

        Schema::table(EventType::getTableName(), function (Blueprint $table) {
            $table->dropColumn('id');
            $table->renameColumn('id_novo', 'id');
            $table->uuid('id')->primary()->change();
        });

        Schema::table(Event::getTableName(), function (Blueprint $table) {
            $table->dropColumn('event_type_id_novo');
            $table->renameColumn('event_type_id_novo', 'event_type_id');
            $table->foreign('event_type_id')->references('id')->on('event_types');
        });*/
    }

    public function down(): void
    {

    }
};
