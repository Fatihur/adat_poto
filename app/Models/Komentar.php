<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komentar extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'nama',
        'body',
        'status',
        'parent_id',
        'commentable_id',
        'commentable_type',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Komentar::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    public function isReply(): bool
    {
        return $this->parent_id !== null;
    }

    public function getNamaPengirimAttribute(): string
    {
        return $this->nama ?: 'Anonim';
    }

    public function getAvatarPengirimAttribute(): ?string
    {
        return null;
    }

    public function getUrlPengirimAttribute(): ?string
    {
        return null;
    }

    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    public function scopeDisembunyikan($query)
    {
        return $query->where('status', 'disembunyikan');
    }

    public function labelStatus(): string
    {
        return match ($this->status) {
            'terbit' => 'Terbit',
            'disembunyikan' => 'Disembunyikan',
            default => 'Unknown',
        };
    }
}
