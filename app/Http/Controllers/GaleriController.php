<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(): View
    {
        $daftarGaleri = Galeri::with('kegiatan')
            ->latest()
            ->paginate(12);

        return view('publik.galeri', compact('daftarGaleri'));
    }
}
