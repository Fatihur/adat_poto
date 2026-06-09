<?php

namespace App\Models;

use App\Models\Traits\HasLikes;
use App\Notifications\KomentarDibalas;
use Illuminate\Support\Facades\Notification;
use XLaravel\Commentable\Comment as BaseComment;

class Komentar extends BaseComment
{
    use HasLikes;

    protected $table = 'comments';

    protected $fillable = [
        'body',
        'pengirim',
        'status',
        'parent_id',
        'commenter_id',
        'commenter_type',
        'commentable_id',
        'commentable_type',
    ];

    protected static function booted(): void
    {
        static::created(function (Komentar $komentar) {
            // Kirim notifikasi email jika ini adalah balasan
            if ($komentar->parent_id && $komentar->commenter) {
                $parent = $komentar->parent;
                if ($parent && $parent->commenter && $parent->commenter instanceof User) {
                    // Jangan kirim notifikasi ke diri sendiri
                    if ($parent->commenter->id !== $komentar->commenter->id) {
                        Notification::send(
                            $parent->commenter,
                            new KomentarDibalas($komentar, $komentar->commenter)
                        );
                    }
                }
            }
        });
    }

    /**
     * Ambil nama pengirim (dari user authenticated atau anonymous).
     */
    public function getNamaPengirimAttribute(): string
    {
        if ($this->pengirim) {
            return $this->pengirim; // legacy anonymous
        }

        return $this->commenter?->name ?? 'Anonymous';
    }

    /**
     * Ambil avatar pengirim.
     */
    public function getAvatarPengirimAttribute(): ?string
    {
        if ($this->commenter && $this->commenter instanceof User) {
            return $this->commenter->avatar;
        }

        return null;
    }

    /**
     * Ambil URL profil pengirim.
     */
    public function getUrlPengirimAttribute(): ?string
    {
        if ($this->commenter && $this->commenter instanceof User) {
            return 'https://www.google.com/accounts/profile';
        }

        return null;
    }

    /**
     * Scope komentar yang sudah diterbitkan.
     */
    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    /**
     * Scope komentar yang disembunyikan.
     */
    public function scopeDisembunyikan($query)
    {
        return $query->where('status', 'disembunyikan');
    }

    /**
     * Label status untuk ditampilkan.
     */
    public function labelStatus(): string
    {
        return match ($this->status) {
            'terbit' => 'Terbit',
            'disembunyikan' => 'Disembunyikan',
            default => 'Unknown',
        };
    }
}
