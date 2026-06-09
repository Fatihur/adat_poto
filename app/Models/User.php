<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'google_id',
        'name',
        'email',
        'avatar',
        'email_notifikasi',
    ];

    protected $casts = [
        'email_notifikasi' => 'boolean',
    ];

    /**
     * Relasi ke komentar yang dibuat user ini.
     */
    public function komentars()
    {
        return $this->morphMany(\XLaravel\Commentable\Comment::class, 'commenter');
    }
}
