<?php

declare(strict_types=1);

use App\Models\SpaceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(SpaceType::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('addresss', 50);
            $table->string('description')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(SpaceType::getTableName());
    }
};
