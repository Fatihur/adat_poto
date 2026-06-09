<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotifikasiController extends Controller
{
    /**
     * Tampilkan daftar notifikasi.
     */
    public function index(): View
    {
        $daftarNotifikasi = Notifikasi::latest()->paginate(20);
        $jumlahBelumDibaca = Notifikasi::belumDibaca()->count();

        return view('admin.notifikasi.index', compact('daftarNotifikasi', 'jumlahBelumDibaca'));
    }

    /**
     * Tandai notifikasi sebagai sudah dibaca.
     */
    public function baca(Notifikasi $notifikasi): RedirectResponse
    {
        $notifikasi->update(['is_read' => true]);

        return $notifikasi->url
            ? redirect($notifikasi->url)
            : back()->with('success', 'Notifikasi ditandai sudah dibaca.');
    }

    /**
     * Tandai semua notifikasi sudah dibaca.
     */
    public function bacaSemua(): RedirectResponse
    {
        Notifikasi::belumDibaca()->update(['is_read' => true]);

        return back()->with('success', 'Semua notifikasi ditandai sudah dibaca.');
    }

    /**
     * Hapus notifikasi.
     */
    public function hapus(Notifikasi $notifikasi): RedirectResponse
    {
        $notifikasi->delete();

        return back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
