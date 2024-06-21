<?php

declare(strict_types=1);

use App\Models\EventType;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    //private const OTHER_ID = '1c5be3eb-e207-4810-a259-19ab62fbaff8';

    public function up(): void
    {
        $roomType = new RoomType();
        $roomType->name = 'Outros';
        $roomType->save();

        Schema::table(Room::getTableName(), function (Blueprint $table) use ($roomType) {
            $table->bigInteger( 'room_type_id')->unsigned()->default($roomType->id);
            $table->foreign('room_type_id')
                ->references('id')
                ->on(RoomType::getTableName());
        });

        Schema::table(Room::getTableName(), function (Blueprint $table){
            $table->bigInteger('room_type_id')
                ->nullable(false)
                ->unsigned()
                ->default(null)
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table(Room::getTableName(), function (Blueprint $table) {
            $table->dropColumn('room_type_id');
        });
    }
};
