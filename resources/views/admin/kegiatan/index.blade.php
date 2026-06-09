@extends('layouts.admin')

@section('judul', 'Kegiatan Adat')

@section('konten')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-stone-900">Kelola Kegiatan Adat</h2>
        <a href="{{ route('admin.kegiatan.create') }}" class="btn-primary">+ Tambah</a>
    </div>

    <div class="mt-6 rounded-xl bg-white shadow-sm ring-1 ring-stone-200">
        @if ($daftarKegiatan->isEmpty())
            <p class="p-8 text-center text-stone-500">Belum ada kegiatan adat.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[4]">
                <thead>
                    <tr class="border-b border-stone-200 bg-stone-50 text-stone-500">
                        <th class="px-4 py-3 font-medium">Judul</th>
                        <th class="px-4 py-3 font-medium">Tanggal</th>
                        <th class="px-4 py-3 font-medium">Lokasi</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($daftarKegiatan as $kegiatan)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-stone-800">{{ $kegiatan->judul }}</td>
                            <td class="px-4 py-3 text-stone-600 whitespace-nowrap">{{ $kegiatan->tanggal_kegiatan->translatedFormat('d M Y') }}</td>
                            <td class="px-4 py-3 text-stone-600">{{ $kegiatan->lokasi }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium 
                                    {{ $kegiatan->status === 'selesai' ? 'bg-green-100 text-green-800' : ($kegiatan->status === 'berlangsung' ? 'bg-blue-100 text-blue-800' : 'bg-stone-100 text-stone-600') }}">
                                    {{ $kegiatan->labelStatus() }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}" class="btn-ghost">Edit</a>
                                <x-hapus-form :action="route('admin.kegiatan.destroy', $kegiatan)" pesan="Hapus kegiatan ini?" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection