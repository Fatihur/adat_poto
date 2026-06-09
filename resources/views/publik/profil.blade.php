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
        <div class="max-w-7xl mx-auto px-0 lg:px-0">
            <div class="flex flex-col lg:flex-row mx-0">
                <div class="lg:w-1/2 ps-0 min-h-[250px] lg:min-h-[400px]">
                    <div class="relative h-full w-full bg-stone-200 flex items-center justify-center p-8 lg:p-12">
                        <div class="text-center">
                            <div class="w-[80px] h-[80px] mx-auto bg-white flex items-center justify-center rounded-full mb-4">
                                <svg class="h-8 w-8 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l14-8-14 8"/></svg>
                            </div>
                            <h3 class="font-heading font-bold text-2xl text-stone-700">Adat Desa Poto</h3>
                            <p class="text-stone-500 mt-2 max-w-xs">Melestarikan budaya warisan leluhur</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 py-10 lg:py-16 px-6 lg:px-16">
                    @if ($daftarProfil->isEmpty())
                        <p class="text-stone-500">Profil desa belum tersedia.</p>
                    @else
                        @foreach ($daftarProfil as $profil)
                            <div class="section-title text-start">
                                <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-4">{{ $profil->judul }}</h1>
                            </div>
                            @if ($profil->gambar)
                                <img src="{{ Storage::url($profil->gambar) }}" alt="{{ $profil->judul }}" class="w-full h-48 sm:h-56 object-cover mb-6" loading="lazy">
                            @endif
                            <div class="text-stone-600 font-sans leading-relaxed prose prose-stone max-w-none">{!! $profil->deskripsi !!}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- About End --}}
@endsection
