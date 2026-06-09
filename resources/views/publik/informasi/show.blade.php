@extends('layouts.publik')

@section('judul', $informasiAdat->judul)

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">{{ $informasiAdat->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li><a href="{{ route('informasi.index') }}" class="text-white hover:text-[#AB7442] transition before:content-['/'] before:me-2">Informasi Adat</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    <div class="max-w-4xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <article>
            <span class="text-[#AB7442] font-sans font-medium text-sm uppercase tracking-wider">{{ $informasiAdat->kategori }}</span>
            <p class="mt-2 text-sm text-stone-400">Diperbarui {{ $informasiAdat->updated_at->translatedFormat('d F Y') }}</p>

            @if ($informasiAdat->gambar)
                <img src="{{ Storage::url($informasiAdat->gambar) }}" alt="{{ $informasiAdat->judul }}" class="mt-6 w-full h-auto object-cover" loading="lazy">
            @endif

            <div class="mt-8 text-stone-600 font-sans leading-relaxed prose prose-stone prose-lg max-w-none">{!! $informasiAdat->deskripsi !!}</div>
        </article>

        {{-- Komentar --}}
        <x-komentar-publik type="informasi" :model="$informasiAdat" />
    </div>
@endsection
