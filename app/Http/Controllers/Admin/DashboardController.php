<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\InformasiAdat;
use App\Models\KegiatanAdat;
use App\Models\StrukturOrganisasi;
use App\Models\ProfilDesa;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $ringkasan = [
            'profil' => ProfilDesa::count(),
            'informasi' => InformasiAdat::count(),
            'pengurus' => StrukturOrganisasi::count(),
            'kegiatan' => KegiatanAdat::count(),
            'galeri' => Galeri::count(),
        ];

        $kegiatanTerbaru = KegiatanAdat::orderByDesc('tanggal_kegiatan')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('ringkasan', 'kegiatanTerbaru'));
    }
}
