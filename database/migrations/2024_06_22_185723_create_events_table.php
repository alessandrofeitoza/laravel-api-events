<?php

use App\Models\Event;
use App\Models\EventType;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Event::getTableName(), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255)->nullable(false);
            $table->timestamp('date', );
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('room_id')
                ->nullable()
                ->references('id')
                ->on(Room::getTableName())
                ->nullOnDelete();

            $table->foreignUuid('eventy_type_id')
                ->nullable()
                ->references('id')
                ->on(EventType::getTableName())
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Event::getTableName());
    }
};
