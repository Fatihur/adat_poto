@extends('layouts.admin')

@section('judul', 'Kelola Komentar')

@section('konten')
    <div class="flex items-center justify-between flex-wrap gap-3">
        <h2 class="text-xl font-bold text-stone-900">Kelola Komentar</h2>
        <form method="GET" class="flex gap-2">
            <select name="status" class="input w-auto text-sm" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="terbit" {{ request('status') === 'terbit' ? 'selected' : '' }}>Terbit</option>
                <option value="draf" {{ request('status') === 'draf' ? 'selected' : '' }}>Draf</option>
            </select>
            <div class="relative">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari komentar..."
                       class="input w-48 text-sm pl-8">
                <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="m20 20-3.5-3.5"/></svg>
            </div>
            @if (request()->hasAny(['status', 'cari']))
                <a href="{{ route('admin.komentar.index') }}" class="btn-ghost text-sm">Reset</a>
            @endif
        </form>
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarKomentar->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada komentar.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[4]">
                <thead>
                    <tr class="border-b border-stone-200 bg-stone-50 text-stone-500">
                        <th class="px-4 py-3 font-medium">Pengirim</th>
                        <th class="px-4 py-3 font-medium">Komentar</th>
                        <th class="px-4 py-3 font-medium">Pada</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($daftarKomentar as $komentar)
                        <tr class="hover:bg-stone-50 transition-colors {{ $komentar->status === 'draf' ? 'bg-amber-50/50' : '' }}">
                            <td class="px-4 py-3 font-medium text-stone-800 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    @if ($komentar->avatar_pengirim)
                                        <img src="{{ $komentar->avatar_pengirim }}" alt="" class="w-6 h-6 rounded-full">
                                    @endif
                                    <span>{{ $komentar->nama_pengirim }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-stone-600 max-w-xs">
                                <p class="truncate">{{ $komentar->body }}</p>
                                @if ($komentar->isReply())
                                    <span class="text-xs text-stone-400">↪ Balasan</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-stone-600">
                                <div class="text-xs">{{ $komentar->created_at->diffForHumans() }}</div>
                                <div class="text-xs text-stone-400">
                                    @if ($komentar->commentable)
                                        {{ $komentar->commentable->judul }}
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium
                                    {{ $komentar->status === 'terbit' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ $komentar->labelStatus() }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                @if ($komentar->status === 'draf')
                                    <form action="{{ route('admin.komentar.setujui', $komentar) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-ghost text-xs">Setujui</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.komentar.tolak', $komentar) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-ghost text-xs">Arsipkan</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.komentar.hapus', $komentar) }}" method="POST" class="inline" onsubmit="return confirm('Hapus komentar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-ghost text-xs text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    @if ($daftarKomentar->hasPages())
        <div class="mt-6">{{ $daftarKomentar->withQueryString()->links() }}</div>
    @endif
@endsection
