<?php

namespace App\Models\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLikes
{
    /**
     * Semua likes pada model ini.
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Cek apakah sudah di-like oleh user tertentu.
     */
    public function isLikedBy($user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    /**
     * Tambah like oleh user.
     */
    public function like($user): Like
    {
        return $this->likes()->firstOrCreate([
            'user_id' => $user->id,
        ]);
    }

    /**
     * Hapus like oleh user.
     */
    public function unlike($user): bool
    {
        return $this->likes()->where('user_id', $user->id)->delete() > 0;
    }

    /**
     * Jumlah likes.
     */
    public function totalLikes(): int
    {
        return $this->likes()->count();
    }
}
