<?php

use App\Models\Event;
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
            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Event::getTableName());
    }
};
