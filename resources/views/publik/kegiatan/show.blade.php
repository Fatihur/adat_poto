@extends('layouts.publik')

@section('judul', $kegiatanAdat->judul)

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">{{ $kegiatanAdat->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li><a href="{{ route('kegiatan.index') }}" class="text-white hover:text-[#AB7442] transition before:content-['/'] before:me-2">Kegiatan Adat</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    <div class="max-w-4xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <article>
            @php
                $badgeClass = ['akan_datang' => 'text-sky-600', 'berlangsung' => 'text-emerald-600', 'selesai' => 'text-stone-400'][$kegiatanAdat->status] ?? 'text-stone-400';
            @endphp
            <span class="font-sans font-medium text-sm uppercase tracking-wider {{ $badgeClass }}">{{ $kegiatanAdat->labelStatus() }}</span>

            <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-sm text-stone-600">
                <span class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/></svg>
                    {{ $kegiatanAdat->tanggal_kegiatan->translatedFormat('l, d F Y') }}
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5" stroke-width="1.8"/></svg>
                    {{ $kegiatanAdat->lokasi }}
                </span>
            </div>

            @if ($kegiatanAdat->gambar)
                <img src="{{ Storage::url($kegiatanAdat->gambar) }}" alt="{{ $kegiatanAdat->judul }}" class="mt-6 w-full h-auto object-cover" loading="lazy">
            @endif

            <div class="mt-8 text-stone-600 font-sans leading-relaxed prose prose-stone prose-lg max-w-none">{!! $kegiatanAdat->deskripsi !!}</div>

            @if ($kegiatanAdat->galeri->isNotEmpty())
                <h2 class="mt-16 font-heading font-black text-2xl text-stone-700 mb-6">Dokumentasi</h2>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    @foreach ($kegiatanAdat->galeri as $foto)
                        <div class="rounded overflow-hidden">
                            <div class="relative overflow-hidden group">
                                <img src="{{ Storage::url($foto->gambar) }}" alt="{{ $foto->judul }}" class="w-full aspect-square object-cover transition duration-500 group-hover:scale-110" loading="lazy">
                                <div class="portfolio-overlay">
                                    <div class="btn-square btn-outline text-white border border-white hover:bg-[#AB7442] hover:border-[#AB7442] transition mx-1">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </article>

        {{-- Komentar --}}
        <x-komentar-publik type="kegiatan" :model="$kegiatanAdat" />
    </div>
@endsection
