@extends('layouts.publik')

@section('judul', 'Kegiatan Adat')

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">Kegiatan Adat</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Kegiatan Adat</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    {{-- Service Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        @if ($daftarKegiatan->isEmpty())
            <p class="text-center text-stone-500 py-16">Belum ada kegiatan adat yang dijadwalkan.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 auto-rows-fr">
                @foreach ($daftarKegiatan as $kegiatan)
                    <a href="{{ route('kegiatan.show', $kegiatan) }}" class="service-item group flex flex-col h-full">
                        <div class="overflow-hidden">
                            @if ($kegiatan->gambar)
                                <img src="{{ Storage::url($kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}" class="w-full h-48 sm:h-56 object-cover" loading="lazy">
                            @else
                                <div class="w-full h-48 sm:h-56 bg-stone-100 flex items-center justify-center text-stone-300">
                                    <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 21V5a2 2 0 0 1 2-2h7l5 5v13M14 3v5h5M9 13h6M9 17h4"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 text-center border-[5px] border-[#F5F5F5] border-t-0 flex flex-col flex-1">
                            @php
                                $badgeClass = ['akan_datang' => 'text-sky-600', 'berlangsung' => 'text-emerald-600', 'selesai' => 'text-stone-400'][$kegiatan->status] ?? 'text-stone-400';
                            @endphp
                            <span class="font-sans font-medium text-sm {{ $badgeClass }}">{{ $kegiatan->labelStatus() }}</span>
                            <h4 class="font-heading font-bold text-lg text-stone-700 my-2">{{ $kegiatan->judul }}</h4>
                            <div class="flex-1"></div>
                            <p class="flex items-center justify-center gap-1.5 text-sm text-stone-500">
                                <svg class="h-4 w-4 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/></svg>
                                {{ $kegiatan->tanggal_kegiatan->translatedFormat('d F Y') }}
                            </p>
                            <p class="flex items-center justify-center gap-1.5 text-sm text-stone-500 mt-0.5">
                                <svg class="h-4 w-4 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5" stroke-width="1.8"/></svg>
                                {{ $kegiatan->lokasi }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-10">{{ $daftarKegiatan->links() }}</div>
        @endif
    </div>
    {{-- Service End --}}
@endsection
