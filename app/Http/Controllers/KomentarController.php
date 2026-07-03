<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KomentarController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'type' => 'required|in:informasi,kegiatan',
            'id' => 'required|integer',
            'nama' => 'required|string|max:100',
            'body' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'body.required' => 'Komentar wajib diisi.',
            'body.max' => 'Komentar maksimal 2000 karakter.',
        ])->validate();

        $model = match ($validated['type']) {
            'informasi' => \App\Models\InformasiAdat::findOrFail($validated['id']),
            'kegiatan' => \App\Models\KegiatanAdat::findOrFail($validated['id']),
        };

        if ($validated['parent_id']) {
            $parent = Komentar::where('commentable_type', $model->getMorphClass())
                ->where('commentable_id', $model->id)
                ->find($validated['parent_id']);

            if (! $parent) {
                return back()->withErrors(['parent_id' => 'Komentar yang dibalas tidak ditemukan.']);
            }
        }

        Komentar::create([
            'commentable_type' => $model->getMorphClass(),
            'commentable_id' => $model->id,
            'parent_id' => $validated['parent_id'] ?? null,
            'nama' => $validated['nama'],
            'body' => $validated['body'],
            'status' => 'terbit',
        ]);

        Notifikasi::create([
            'judul' => 'Komentar Baru',
            'pesan' => "{$validated['nama']} berkomentar pada \"{$model->judul}\"",
            'url' => route('admin.komentar.index'),
            'is_read' => false,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
