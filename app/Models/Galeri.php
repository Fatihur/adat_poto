<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kegiatan_id',
        'tanggal_dokumentasi',
    ];

    protected $casts = [
        'tanggal_dokumentasi' => 'date',
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(KegiatanAdat::class, 'kegiatan_id');
    }
}
