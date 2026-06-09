<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MengelolaGambar;
use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use App\Models\KegiatanAdat;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GaleriController extends Controller
{
    use MengelolaGambar;

    public function index(): View
    {
        $daftarGaleri = Galeri::with('kegiatan')->latest()->get();

        return view('admin.galeri.index', compact('daftarGaleri'));
    }

    public function create(): View
    {
        $daftarKegiatan = KegiatanAdat::orderBy('judul')->get();

        return view('admin.galeri.create', compact('daftarKegiatan'));
    }

    public function store(GaleriRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('gambar');
        $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'galeri');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')
            ->with('sukses', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri): View
    {
        $daftarKegiatan = KegiatanAdat::orderBy('judul')->get();

        return view('admin.galeri.edit', compact('galeri', 'daftarKegiatan'));
    }

    public function update(GaleriRequest $request, Galeri $galeri): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($galeri->gambar);
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'galeri');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('sukses', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri): RedirectResponse
    {
        $this->hapusGambar($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('sukses', 'Foto galeri berhasil dihapus.');
    }
}
