<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(): View
    {
        $daftarProfil = ProfilDesa::latest()->get();

        return view('publik.profil', compact('daftarProfil'));
    }
}
