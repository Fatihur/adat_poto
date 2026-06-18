<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StrukturOrganisasiRequest;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StrukturController extends Controller
{
    public function index(): View
    {
        $daftarPengurus = StrukturOrganisasi::orderBy('urutan')->orderBy('nama')->get();

        return view('admin.pengurus.index', compact('daftarPengurus'));
    }

    public function create(): View
    {
        return view('admin.pengurus.create');
    }

    public function store(StrukturOrganisasiRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['urutan'] = $data['urutan'] ?? 0;

        StrukturOrganisasi::create($data);

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil ditambahkan.');
    }

    public function edit(StrukturOrganisasi $penguru): View
    {
        return view('admin.pengurus.edit', ['pengurus' => $penguru]);
    }

    public function update(StrukturOrganisasiRequest $request, StrukturOrganisasi $penguru): RedirectResponse
    {
        $data = $request->validated();
        $data['urutan'] = $data['urutan'] ?? 0;

        $penguru->update($data);

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(StrukturOrganisasi $penguru): RedirectResponse
    {
        $penguru->delete();

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil dihapus.');
    }
}
