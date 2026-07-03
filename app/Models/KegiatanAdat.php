<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class KegiatanAdat extends Model
{
    protected $table = 'kegiatan_adat';

    protected $fillable = [
        'judul',
        'tanggal_kegiatan',
        'lokasi',
        'deskripsi',
        'gambar',
        'status',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];

    public const STATUS = [
        'akan_datang' => 'Akan Datang',
        'berlangsung' => 'Sedang Berlangsung',
        'selesai' => 'Selesai',
    ];

    public function labelStatus(): string
    {
        return self::STATUS[$this->status] ?? $this->status;
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'kegiatan_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }

    public function rootComments(): MorphMany
    {
        return $this->comments()->whereNull('parent_id');
    }
}
