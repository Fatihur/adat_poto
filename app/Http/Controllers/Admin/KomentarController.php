<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KomentarController extends Controller
{
    public function index(Request $request): View
    {
        $query = Komentar::with('commentable');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', "%{$cari}%")
                  ->orWhere('body', 'like', "%{$cari}%");
            });
        }

        $daftarKomentar = $query->latest()->paginate(20);

        return view('admin.komentar.index', compact('daftarKomentar'));
    }

    public function tampilkan(Komentar $komentar): RedirectResponse
    {
        $komentar->update(['status' => 'terbit']);

        return back()->with('success', 'Komentar berhasil ditampilkan.');
    }

    public function sembunyikan(Komentar $komentar): RedirectResponse
    {
        $komentar->update(['status' => 'disembunyikan']);

        return back()->with('success', 'Komentar berhasil disembunyikan.');
    }
}
