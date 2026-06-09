<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasLikes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use XLaravel\Commentable\Commentable;

class InformasiAdat extends Model
{
    use Commentable;
    protected $table = 'informasi_adat';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'gambar',
        'status',
    ];

    /**
     * Override relasi komentar pakai model Komentar kita.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }
}
