<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\View\View;

class StrukturController extends Controller
{
    public function index(): View
    {
        $daftarPengurus = StrukturOrganisasi::orderBy('urutan')
            ->orderBy('nama')
            ->get();

        return view('publik.struktur', compact('daftarPengurus'));
    }
}
