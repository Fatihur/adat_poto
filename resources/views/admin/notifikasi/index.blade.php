@extends('layouts.admin')

@section('judul', 'Notifikasi')

@section('konten')
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-stone-900">Notifikasi</h2>
            @if ($jumlahBelumDibaca > 0)
                <span class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">
                    {{ $jumlahBelumDibaca }} belum dibaca
                </span>
            @endif
        </div>
        @if ($jumlahBelumDibaca > 0)
            <form action="{{ route('admin.notifikasi.bacaSemua') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-primary text-sm">Tandai Semua Dibaca</button>
            </form>
        @endif
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarNotifikasi->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada notifikasi.</p>
        @else
            <ul class="divide-y divide-stone-100">
                @foreach ($daftarNotifikasi as $notif)
                    <li class="flex items-start gap-4 px-5 py-4 transition hover:bg-stone-50 {{ !$notif->is_read ? 'bg-sky-50/50' : '' }}">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full {{ !$notif->is_read ? 'bg-sky-500' : 'bg-stone-200' }} flex items-center justify-center">
                                <svg class="h-4 w-4 {{ !$notif->is_read ? 'text-white' : 'text-stone-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-stone-900 {{ !$notif->is_read ? 'font-semibold' : '' }}">{{ $notif->judul }}</p>
                            <p class="text-sm text-stone-500 mt-0.5">{{ $notif->pesan }}</p>
                            <p class="text-xs text-stone-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex-shrink-0 flex items-center gap-2">
                            @if (!$notif->is_read)
                                <a href="{{ route('admin.notifikasi.baca', $notif) }}" class="btn-ghost text-xs">Baca</a>
                            @endif
                            <form action="{{ route('admin.notifikasi.hapus', $notif) }}" method="POST" onsubmit="return confirm('Hapus notifikasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-ghost text-xs text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    @if ($daftarNotifikasi->hasPages())
        <div class="mt-6">{{ $daftarNotifikasi->links() }}</div>
    @endif
@endsection
