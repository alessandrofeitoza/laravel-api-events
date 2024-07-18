<?php

declare(strict_types=1);

use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Room::getTableName(), function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Room::getTableName());
    }
};
