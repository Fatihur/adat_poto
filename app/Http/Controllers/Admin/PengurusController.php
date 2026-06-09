<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengurusAdatRequest;
use App\Models\PengurusAdat;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PengurusController extends Controller
{
    public function index(): View
    {
        $daftarPengurus = PengurusAdat::orderBy('urutan')->orderBy('nama')->get();

        return view('admin.pengurus.index', compact('daftarPengurus'));
    }

    public function create(): View
    {
        return view('admin.pengurus.create');
    }

    public function store(PengurusAdatRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['urutan'] = $data['urutan'] ?? 0;

        PengurusAdat::create($data);

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil ditambahkan.');
    }

    public function edit(PengurusAdat $penguru): View
    {
        return view('admin.pengurus.edit', ['pengurus' => $penguru]);
    }

    public function update(PengurusAdatRequest $request, PengurusAdat $penguru): RedirectResponse
    {
        $data = $request->validated();
        $data['urutan'] = $data['urutan'] ?? 0;

        $penguru->update($data);

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(PengurusAdat $penguru): RedirectResponse
    {
        $penguru->delete();

        return redirect()->route('admin.pengurus.index')
            ->with('sukses', 'Data pengurus berhasil dihapus.');
    }
}
