<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MengelolaGambar;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilDesaRequest;
use App\Models\ProfilDesa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfilDesaController extends Controller
{
    use MengelolaGambar;

    public function index(): View
    {
        $daftarProfil = ProfilDesa::latest()->get();

        return view('admin.profil.index', compact('daftarProfil'));
    }

    public function edit(ProfilDesa $profil): View
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(ProfilDesaRequest $request, ProfilDesa $profil): RedirectResponse
    {
        $data = $request->safe()->except('gambar');

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($profil->gambar);
            $data['gambar'] = $this->simpanGambar($request->file('gambar'), 'profil');
        }

        $profil->update($data);

        return redirect()->route('admin.profil.index')
            ->with('sukses', 'Profil desa berhasil diperbarui.');
    }
}
