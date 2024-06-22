<?php

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(Room::getTableName(), function (Blueprint $table) {
            $table->dropForeign(['room_type_id']);
        });

        Schema::table(Room::getTableName(), function (Blueprint $table) {
            $table->foreign('room_type_id')
                ->references('id')
                ->on(RoomType::getTableName())
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        //
    }
};
