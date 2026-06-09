<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KomentarController extends Controller
{
    /**
     * Simpan komentar baru untuk Informasi Adat atau Kegiatan Adat.
     */
    public function store(Request $request): RedirectResponse
    {
        // Cek login
        $user = Auth::guard('pengguna')->user();
        if (! $user) {
            return back()->with('error', 'Silakan login dengan Google terlebih dahulu untuk berkomentar.');
        }

        $validated = Validator::make($request->all(), [
            'type' => 'required|in:informasi,kegiatan',
            'id' => 'required|integer',
            'body' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer',
        ], [
            'body.required' => 'Komentar wajib diisi.',
            'body.max' => 'Komentar maksimal 2000 karakter.',
        ])->validate();

        // Cari model yang dikomentari
        $model = match ($validated['type']) {
            'informasi' => \App\Models\InformasiAdat::findOrFail($validated['id']),
            'kegiatan' => \App\Models\KegiatanAdat::findOrFail($validated['id']),
        };

        // Validasi parent_id milik model yang sama
        if ($validated['parent_id']) {
            $parent = Komentar::where('commentable_type', get_class($model))
                ->where('commentable_id', $model->id)
                ->find($validated['parent_id']);

            if (! $parent) {
                return back()->withErrors(['parent_id' => 'Komentar yang dibalas tidak ditemukan.']);
            }
        }

        // Buat komentar via trait (dengan user authenticated sebagai commenter)
        $comment = $model->addComment($validated['body'], $user);

        // Update parent_id untuk reply
        if ($validated['parent_id']) {
            $comment->forceFill(['parent_id' => $validated['parent_id']])->save();
        }

        // Notifikasi untuk admin dashboard
        $judulKonten = $model->judul;

        Notifikasi::create([
            'judul' => 'Komentar Baru',
            'pesan' => "{$user->name} berkomentar pada \"{$judulKonten}\"",
            'url' => route('admin.komentar.index'),
            'is_read' => false,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
