<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KomentarController extends Controller
{
    /**
     * Tampilkan daftar semua komentar.
     */
    public function index(Request $request): View
    {
        $query = Komentar::with('commentable');

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter pencarian
        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('pengirim', 'like', "%{$cari}%")
                  ->orWhere('body', 'like', "%{$cari}%");
            });
        }

        $daftarKomentar = $query->latest()->paginate(20);

        return view('admin.komentar.index', compact('daftarKomentar'));
    }

    /**
     * Tampilkan komentar (ubah status jadi terbit).
     */
    public function tampilkan(Komentar $komentar): RedirectResponse
    {
        $komentar->update(['status' => 'terbit']);

        return back()->with('success', 'Komentar berhasil ditampilkan.');
    }

    /**
     * Sembunyikan komentar (ubah status jadi disembunyikan).
     */
    public function sembunyikan(Komentar $komentar): RedirectResponse
    {
        $komentar->update(['status' => 'disembunyikan']);

        return back()->with('success', 'Komentar berhasil disembunyikan.');
    }
}
