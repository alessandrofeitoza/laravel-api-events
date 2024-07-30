<?php

declare(strict_types=1);

use App\Models\Action;
use App\Models\Permission;
use App\Models\Resource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Permission::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('action_id')
                ->references('id')
                ->on(Action::getTableName())
                ->noActionOnDelete();

            $table->foreignId('resource_id')
                ->references('id')
                ->on(Resource::getTableName())
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Permission::getTableName());
    }
};
