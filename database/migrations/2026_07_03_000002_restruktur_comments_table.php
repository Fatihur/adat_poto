<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        try {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropIndex('comments_commenter_type_commenter_id_index');
            });
        } catch (\Exception) {
        }

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['commenter_type', 'commenter_id', 'pengirim']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->string('nama', 100)->default('');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('nama');

            $table->string('pengirim', 100)->nullable();

            $table->nullableMorphs('commenter');
        });
    }
};
