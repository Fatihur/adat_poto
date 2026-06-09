<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel informasi adat (ponan, perkawinan, kesenian, dll).
     */
    public function up(): void
    {
        Schema::create('informasi_adat', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->enum('status', ['terbit', 'draf'])->default('terbit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_adat');
    }
};
