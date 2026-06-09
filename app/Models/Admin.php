<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    /**
     * Kolom password memakai nama Indonesia.
     */
    public function getAuthPassword(): string
    {
        return $this->kata_sandi;
    }

    /**
     * Jaga agar 'kata_sandi' otomatis di-hash saat di-set.
     */
    protected function casts(): array
    {
        return [
            'kata_sandi' => 'hashed',
        ];
    }
}
