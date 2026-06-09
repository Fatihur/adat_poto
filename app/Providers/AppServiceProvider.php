<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Morph map untuk polymorphic relations
        Relation::enforceMorphMap([
            'user' => \App\Models\User::class,
            'informasi_adat' => \App\Models\InformasiAdat::class,
            'kegiatan_adat' => \App\Models\KegiatanAdat::class,
            'komentar' => \App\Models\Komentar::class,
            'like' => \App\Models\Like::class,
        ]);
    }
}
