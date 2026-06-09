<?php

namespace App\Http\Controllers;

use App\Models\InformasiAdat;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InformasiAdatController extends Controller
{
    public function index(Request $request): View
    {
        $daftarInformasi = InformasiAdat::where('status', 'terbit')
            ->when($request->filled('cari'), fn($q) => $q->where(function($q) use ($request) {
                $q->where('judul', 'like', '%'.$request->cari.'%')
                  ->orWhere('deskripsi', 'like', '%'.$request->cari.'%');
            }))
            ->when($request->filled('kategori'), fn($q) => $q->where('kategori', $request->kategori))
            ->latest()
            ->paginate(9);

        $kategoriList = InformasiAdat::where('status', 'terbit')
            ->distinct()
            ->pluck('kategori');

        return view('publik.informasi.index', compact('daftarInformasi', 'kategoriList'));
    }

    public function show(InformasiAdat $informasiAdat): View
    {
        abort_if($informasiAdat->status !== 'terbit', 404);

        return view('publik.informasi.show', compact('informasiAdat'));
    }
}
