<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $fillable = [
        'judul',
        'pesan',
        'url',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Scope notifikasi yang belum dibaca.
     */
    public function scopeBelumDibaca($query)
    {
        return $query->where('is_read', false);
    }
}
