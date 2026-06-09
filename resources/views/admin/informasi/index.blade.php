@extends('layouts.admin')

@section('judul', 'Informasi Adat')

@section('konten')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-stone-900">Kelola Informasi Adat</h2>
        <a href="{{ route('admin.informasi.create') }}" class="btn-primary">+ Tambah</a>
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarInformasi->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada informasi adat.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[3]">
                <thead>
                    <tr class="border-b border-stone-200 bg-stone-50 text-stone-500">
                        <th class="px-4 py-3 font-medium">Judul</th>
                        <th class="px-4 py-3 font-medium">Kategori</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($daftarInformasi as $item)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-stone-800">{{ $item->judul }}</td>
                            <td class="px-4 py-3 text-stone-600">{{ $item->kategori }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium {{ $item->status === 'terbit' ? 'bg-green-100 text-green-800' : 'bg-stone-100 text-stone-600' }}">
                                    {{ $item->status === 'terbit' ? 'Terbit' : 'Draf' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <a href="{{ route('admin.informasi.edit', $item) }}" class="btn-ghost">Edit</a>
                                <x-hapus-form :action="route('admin.informasi.destroy', $item)" pesan="Hapus informasi ini?" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection