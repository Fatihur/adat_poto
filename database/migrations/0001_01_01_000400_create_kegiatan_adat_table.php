<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel kegiatan adat (jadwal & pelaksanaan).
     */
    public function up(): void
    {
        Schema::create('kegiatan_adat', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal_kegiatan');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->enum('status', ['akan_datang', 'berlangsung', 'selesai'])->default('akan_datang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan_adat');
    }
};
