<?php

declare(strict_types=1);

use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Profile::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Op');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Profile::getTableName());
    }
};
