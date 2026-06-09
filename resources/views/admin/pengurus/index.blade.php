@extends('layouts.admin')

@section('judul', 'Struktur Organisasi')

@section('konten')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-stone-900">Kelola Pengurus Adat</h2>
        <a href="{{ route('admin.pengurus.create') }}" class="btn-primary">+ Tambah</a>
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarPengurus->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada data pengurus.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[3]">
                <thead>
                    <tr class="border-b border-stone-200 bg-stone-50 text-stone-500">
                        <th class="px-4 py-3 font-medium">Urutan</th>
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">Jabatan</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($daftarPengurus as $pengurus)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="px-4 py-3 text-stone-600 text-center">{{ $pengurus->urutan }}</td>
                            <td class="px-4 py-3 font-medium text-stone-800">{{ $pengurus->nama }}</td>
                            <td class="px-4 py-3 text-stone-600">{{ $pengurus->jabatan }}</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <a href="{{ route('admin.pengurus.edit', $pengurus) }}" class="btn-ghost">Edit</a>
                                <x-hapus-form :action="route('admin.pengurus.destroy', $pengurus)" pesan="Hapus pengurus ini?" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection