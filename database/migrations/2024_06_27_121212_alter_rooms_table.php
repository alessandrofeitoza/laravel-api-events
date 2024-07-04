<?php

use App\Models\Event;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(Room::getTableName(), function (Blueprint $table) {
            $table->string('image_url');
        });
    }

    public function down(): void
    {
        Schema::create(Room::getTableName(), function (Blueprint $table) {
            $table->string('image_url');
        });
    }
};
