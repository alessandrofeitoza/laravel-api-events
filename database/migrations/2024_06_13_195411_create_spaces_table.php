<?php

declare(strict_types=1);

use App\Models\Space;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Space::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description');
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Space::getTableName());
    }
};
