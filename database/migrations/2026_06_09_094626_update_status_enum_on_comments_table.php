<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah enum: hapus 'draf', tambah 'disembunyikan'
        DB::statement("ALTER TABLE comments MODIFY COLUMN status ENUM('terbit', 'disembunyikan') NOT NULL DEFAULT 'terbit'");

        // Konversi komentar 'draf' lama jadi 'terbit' (karena skrg langsung terbit)
        DB::table('comments')->where('status', 'draf')->update(['status' => 'terbit']);
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE comments MODIFY COLUMN status ENUM('draf', 'terbit') NOT NULL DEFAULT 'draf'");
    }
};
