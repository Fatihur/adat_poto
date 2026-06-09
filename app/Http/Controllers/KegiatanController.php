<?php

namespace App\Http\Controllers;

use App\Models\KegiatanAdat;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index(): View
    {
        $daftarKegiatan = KegiatanAdat::orderByDesc('tanggal_kegiatan')
            ->paginate(9);

        return view('publik.kegiatan.index', compact('daftarKegiatan'));
    }

    public function show(KegiatanAdat $kegiatanAdat): View
    {
        $kegiatanAdat->load('galeri');

        return view('publik.kegiatan.show', compact('kegiatanAdat'));
    }
}
