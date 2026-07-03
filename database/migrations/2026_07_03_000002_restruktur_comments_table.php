<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['commenter_type', 'commenter_id']);
        });

        DB::statement("ALTER TABLE comments CHANGE pengirim nama VARCHAR(100) NOT NULL DEFAULT ''");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE comments CHANGE nama pengirim VARCHAR(100) NULL DEFAULT NULL");

        Schema::table('comments', function (Blueprint $table) {
            $table->nullableMorphs('commenter');
        });
    }
};
