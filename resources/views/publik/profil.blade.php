@extends('layouts.publik')

@section('judul', 'Profil')

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">Profil Desa</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Profil</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    {{-- About Start --}}
    <div class="bg-[#F5F5F5] overflow-hidden my-12 lg:my-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-5 py-10 lg:py-16 flex items-center justify-center">
            <div class="w-full max-w-3xl">
                @if ($daftarProfil->isEmpty())
                    <p class="text-center text-stone-500">Profil desa belum tersedia.</p>
                @else
                    @foreach ($daftarProfil as $profil)
                        <div class="section-title text-center">
                            <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-4">{{ $profil->judul }}</h1>
                        </div>
                        @if ($profil->gambar)
                            <img src="{{ Storage::url($profil->gambar) }}" alt="{{ $profil->judul }}" class="w-full h-48 sm:h-56 object-cover mb-6 rounded-lg" loading="lazy">
                        @endif
                        <div class="text-stone-600 font-sans leading-relaxed prose prose-stone max-w-none">{!! $profil->deskripsi !!}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    {{-- About End --}}
@endsection
