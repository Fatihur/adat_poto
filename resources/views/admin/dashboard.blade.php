@extends('layouts.admin')

@section('judul', 'Dashboard')

@section('konten')
    @php
        $warnaKartu = ['bg-blue-500', 'bg-amber-500', 'bg-green-500', 'bg-purple-500', 'bg-rose-500'];
        $kartu = [
            ['Profil Desa', $ringkasan['profil'], 'admin.profil.index'],
            ['Informasi Adat', $ringkasan['informasi'], 'admin.informasi.index'],
            ['Pengurus Adat', $ringkasan['pengurus'], 'admin.pengurus.index'],
            ['Kegiatan Adat', $ringkasan['kegiatan'], 'admin.kegiatan.index'],
            ['Galeri', $ringkasan['galeri'], 'admin.galeri.index'],
        ];
    @endphp

    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ($kartu as $i => [$label, $jumlah, $rute])
            <a href="{{ route($rute) }}" class="group rounded-xl bg-white p-5 shadow-sm ring-1 ring-stone-200 transition-all hover:shadow-md hover:-translate-y-0.5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-stone-500 group-hover:text-stone-700 transition-colors">{{ $label }}</p>
                    <span class="inline-block h-3 w-3 rounded-full {{ $warnaKartu[$i] }} opacity-60 group-hover:opacity-100 transition-opacity"></span>
                </div>
                <p class="mt-2 text-3xl font-extrabold text-stone-900">{{ $jumlah }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8 rounded-xl bg-white p-6 shadow-sm ring-1 ring-stone-200">
        <h2 class="text-lg font-semibold text-stone-900">Kegiatan Terbaru</h2>
        @if ($kegiatanTerbaru->isEmpty())
            <p class="mt-3 text-sm text-stone-500">Belum ada kegiatan.</p>
        @else
            <table class="data-table w-full text-left text-sm" data-disable-order="[]">
                <thead>
                    <tr class="border-b border-stone-200 text-stone-500">
                        <th class="pb-2.5 pr-4 font-medium">Judul</th>
                        <th class="pb-2.5 pr-4 font-medium">Tanggal</th>
                        <th class="pb-2.5 pr-4 font-medium">Lokasi</th>
                        <th class="pb-2.5 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($kegiatanTerbaru as $kegiatan)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="py-2.5 pr-4 font-medium text-stone-800">{{ $kegiatan->judul }}</td>
                            <td class="py-2.5 pr-4 text-stone-600 whitespace-nowrap">{{ $kegiatan->tanggal_kegiatan->translatedFormat('d M Y') }}</td>
                            <td class="py-2.5 pr-4 text-stone-600">{{ $kegiatan->lokasi }}</td>
                            <td class="py-2.5 text-stone-600">
                                <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium 
                                    {{ $kegiatan->status === 'selesai' ? 'bg-green-100 text-green-800' : ($kegiatan->status === 'berlangsung' ? 'bg-blue-100 text-blue-800' : 'bg-stone-100 text-stone-600') }}">
                                    {{ $kegiatan->labelStatus() }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection