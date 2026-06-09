<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom pengirim (nama anonymous) dan status moderasi.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('pengirim', 100)->nullable()->after('body');
            $table->enum('status', ['draf', 'terbit'])->default('terbit')->after('pengirim');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['pengirim', 'status']);
        });
    }
};
