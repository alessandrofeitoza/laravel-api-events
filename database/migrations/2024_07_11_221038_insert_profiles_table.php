<?php

declare(strict_types=1);

use App\Models\Profile;
use App\Models\Resource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $profile = new Profile();
        $profile->name = 'Admin';
        $profile->description = 'Administrador Geral';
        $profile->save();
    }

    public function down(): void
    {
        Profile::where('name', 'Admin')->delete();
        Profile::where('description','Administrador Geral')->delete();
    }

};

