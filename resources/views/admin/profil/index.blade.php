@extends('layouts.admin')

@section('judul', 'Profil Desa')

@section('konten')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-stone-900">Kelola Profil Desa</h2>
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarProfil->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada data profil desa.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[3]">
                <thead>
                    <tr class="border-b border-stone-200 bg-stone-50 text-stone-500">
                        <th class="px-4 py-3 font-medium">Gambar</th>
                        <th class="px-4 py-3 font-medium">Judul</th>
                        <th class="px-4 py-3 font-medium">Deskripsi</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($daftarProfil as $profil)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="h-12 w-16 overflow-hidden rounded bg-stone-100 ring-1 ring-stone-200">
                                    @if ($profil->gambar)
                                        <img src="{{ Storage::url($profil->gambar) }}" class="h-full w-full object-cover" alt="" loading="lazy">
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-stone-800">{{ $profil->judul }}</td>
                            <td class="px-4 py-3 text-stone-600 max-w-xs truncate">{{ \Illuminate\Support\Str::limit(strip_tags($profil->deskripsi), 80) }}</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <a href="{{ route('admin.profil.edit', $profil) }}" class="btn-ghost">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection