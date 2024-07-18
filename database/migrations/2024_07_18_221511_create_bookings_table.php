<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer', length:30);
            $table->string('email')->unique();
            $table->string('phone');
            $table->dateTime('begin_date');
            $table->dateTime('end_date');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
