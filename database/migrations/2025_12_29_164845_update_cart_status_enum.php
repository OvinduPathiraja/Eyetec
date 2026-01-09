<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE carts 
            MODIFY status ENUM('active', 'completed') NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE carts 
            MODIFY status ENUM('active') NOT NULL
        ");
    }
};
