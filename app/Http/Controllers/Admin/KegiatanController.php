<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MengelolaGambar;
use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanAdatRequest;
use App\Models\KegiatanAdat;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    use MengelolaGambar;

    public function index(): View
    {
        $daftarKegiatan = KegiatanAdat::orderByDesc('tanggal_kegiatan')->get();

        return view('admin.kegiatan.index', compact('daftarKegiatan'));
    }

    public function create(): View
    {
        return view('admin.kegiatan.create');
    }

    public function store(KegiatanAdatRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'kegiatan');
        }

        KegiatanAdat::create($data);

        return redirect()->route('admin.kegiatan.index')
            ->with('sukses', 'Kegiatan adat berhasil ditambahkan.');
    }

    public function edit(KegiatanAdat $kegiatan): View
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(KegiatanAdatRequest $request, KegiatanAdat $kegiatan): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($kegiatan->gambar);
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'kegiatan');
        }

        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan.index')
            ->with('sukses', 'Kegiatan adat berhasil diperbarui.');
    }

    public function destroy(KegiatanAdat $kegiatan): RedirectResponse
    {
        $this->hapusGambar($kegiatan->gambar);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('sukses', 'Kegiatan adat berhasil dihapus.');
    }
}
