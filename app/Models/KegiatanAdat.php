<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use XLaravel\Commentable\Commentable;

class KegiatanAdat extends Model
{
    use Commentable;

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

    /**
     * Label status untuk ditampilkan ke pengguna.
     */
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

    /**
     * Override relasi komentar pakai model Komentar kita.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }
}
