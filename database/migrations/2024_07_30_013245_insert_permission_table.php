<?php

declare(strict_types=1);

use App\Models\Action;
use App\Models\Permission;
use App\Models\Resource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $roomResource = Resource::where('name', 'Room')->first();
        $getAction = Action::where('name', 'GET')->first();
        $postAction = Action::where('name', 'POST')->first();

        $insertGetPermissionForRoomResource = new Permission();
        $insertGetPermissionForRoomResource->action_id = $getAction->id;
        $insertGetPermissionForRoomResource->resource_id = $roomResource->id;
        $insertGetPermissionForRoomResource->saveOrFail();

        $insertPostPermissionForRoomResource = new Permission();
        $insertPostPermissionForRoomResource->action_id = $postAction->id;
        $insertPostPermissionForRoomResource->resource_id = $roomResource->id;
        $insertPostPermissionForRoomResource->saveOrFail();
    }

    public function down(): void
    {
        DB::table(Permission::getTableName())->truncate();
    }
};
