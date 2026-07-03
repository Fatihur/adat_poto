<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class InformasiAdat extends Model
{
    protected $table = 'informasi_adat';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'gambar',
        'status',
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }

    public function rootComments(): MorphMany
    {
        return $this->comments()->whereNull('parent_id');
    }
}
