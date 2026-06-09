@extends('layouts.publik')

@section('judul', 'Galeri')

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">Galeri Dokumentasi</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    {{-- Projects/Portfolio Start --}}
    <div x-data="{ buka: false, gambar: '', judul: '' }" class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <div class="section-title text-center">
            <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-8">Galeri Foto</h1>
        </div>

        @if ($daftarGaleri->isEmpty())
            <p class="text-center text-stone-500 py-16">Belum ada dokumentasi yang tersedia.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($daftarGaleri as $foto)
                    <div class="rounded overflow-hidden group">
                        <div class="relative overflow-hidden">
                            <img src="{{ Storage::url($foto->gambar) }}" alt="{{ $foto->judul }}" class="w-full aspect-square object-cover transition duration-500 group-hover:scale-110" loading="lazy">
                            <div class="portfolio-overlay cursor-pointer" @click="buka = true; gambar = '{{ Storage::url($foto->gambar) }}'; judul = @js($foto->judul)">
                                <div class="btn-square btn-outline text-white border border-white hover:bg-[#AB7442] hover:border-[#AB7442] transition mx-1">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="border-[5px] border-[#F5F5F5] border-t-0 p-4 bg-white">
                            <p class="font-sans font-medium text-stone-700 truncate">{{ $foto->judul }}</p>
                            @if ($foto->tanggal_dokumentasi)
                                <p class="text-xs text-stone-400 mt-1">{{ $foto->tanggal_dokumentasi->translatedFormat('d F Y') }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">{{ $daftarGaleri->links() }}</div>
        @endif

        {{-- Lightbox --}}
        <div x-show="buka" x-cloak @keydown.escape.window="buka = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" @click="buka = false">
            <div class="max-w-3xl w-full" @click.stop>
                <img :src="gambar" :alt="judul" class="max-h-[80vh] w-full object-contain">
                <p class="mt-3 text-center text-sm text-white/80" x-text="judul"></p>
            </div>
            <button @click="buka = false" class="absolute right-4 top-4 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-2xl text-white/80 hover:bg-white/20 hover:text-white transition">&times;</button>
        </div>
    </div>
    {{-- Projects End --}}
@endsection
