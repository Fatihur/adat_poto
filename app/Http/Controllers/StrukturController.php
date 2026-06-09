<?php

namespace App\Http\Controllers;

use App\Models\PengurusAdat;
use Illuminate\View\View;

class StrukturController extends Controller
{
    public function index(): View
    {
        $daftarPengurus = PengurusAdat::orderBy('urutan')
            ->orderBy('nama')
            ->get();

        return view('publik.struktur', compact('daftarPengurus'));
    }
}
