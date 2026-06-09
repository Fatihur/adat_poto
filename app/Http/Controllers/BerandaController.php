<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\InformasiAdat;
use App\Models\KegiatanAdat;
use App\Models\ProfilDesa;
use Illuminate\View\View;

class BerandaController extends Controller
{
    public function index(): View
    {
        $profil = ProfilDesa::latest()->first();

        $kegiatanTerbaru = KegiatanAdat::orderByDesc('tanggal_kegiatan')
            ->take(3)
            ->get();

        $galeriTerbaru = Galeri::latest()->take(6)->get();

        $informasiTerbaru = InformasiAdat::where('status', 'terbit')
            ->latest()
            ->take(3)
            ->get();

        return view('publik.beranda', compact(
            'profil',
            'kegiatanTerbaru',
            'galeriTerbaru',
            'informasiTerbaru'
        ));
    }
}
