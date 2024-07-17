<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'profile_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    public function down()
    {
        DB::table('users')->where('email', 'admin@example.com')->delete();
    }
};
