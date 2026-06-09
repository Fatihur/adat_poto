<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MengelolaGambar;
use App\Http\Controllers\Controller;
use App\Http\Requests\InformasiAdatRequest;
use App\Models\InformasiAdat;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InformasiAdatController extends Controller
{
    use MengelolaGambar;

    public function index(): View
    {
        $daftarInformasi = InformasiAdat::latest()->get();

        return view('admin.informasi.index', compact('daftarInformasi'));
    }

    public function create(): View
    {
        return view('admin.informasi.create');
    }

    public function store(InformasiAdatRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'informasi');
        }

        InformasiAdat::create($data);

        return redirect()->route('admin.informasi.index')
            ->with('sukses', 'Informasi adat berhasil ditambahkan.');
    }

    public function edit(InformasiAdat $informasi): View
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(InformasiAdatRequest $request, InformasiAdat $informasi): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($informasi->gambar);
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'informasi');
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')
            ->with('sukses', 'Informasi adat berhasil diperbarui.');
    }

    public function destroy(InformasiAdat $informasi): RedirectResponse
    {
        $this->hapusGambar($informasi->gambar);
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
            ->with('sukses', 'Informasi adat berhasil dihapus.');
    }
}
