<?php

declare(strict_types=1);

use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $profile = new Profile();
        $profile->name = 'Admin';
        $profile->description = 'Adminstrador geral';
        $profile->save();
    }

    public function down(): void
    {
        Profile::where('name', 'Admin')->delete();
        Profile::where('description', 'Adminstrador geral')->delete();
    }
};
