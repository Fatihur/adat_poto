<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengurusAdat extends Model
{
    protected $table = 'pengurus_adat';

    protected $fillable = [
        'nama',
        'jabatan',
        'deskripsi',
        'foto',
        'urutan',
    ];
}
