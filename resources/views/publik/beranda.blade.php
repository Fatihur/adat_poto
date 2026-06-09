@extends('layouts.publik')

@section('judul', 'Beranda')

@section('konten')
    {{-- Hero / Carousel Start --}}
    <div class="w-full">
        <div class="relative bg-[#353535] bg-cover bg-center" style="background-image: linear-gradient(rgba(53,53,53,.7), rgba(53,53,53,.7)), url('{{ Storage::url('profil/desa-poto.jpg') }}'); background-blend-mode: normal;">
            <div class="mx-auto max-w-7xl px-4 lg:px-5 py-20 lg:py-36">
                <div class="max-w-3xl mx-auto text-center">
                    <h5 class="text-white/80 font-sans font-medium uppercase tracking-wider text-sm mb-4">Selamat Datang di</h5>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black leading-tight mb-5">Sistem Informasi <span class="text-[#AB7442]">Adat</span> Desa Poto</h1>
                    <p class="text-base sm:text-lg text-white/70 font-sans font-medium max-w-2xl mx-auto mb-8">
                        {{ $profil?->deskripsi ? \Illuminate\Support\Str::limit(strip_tags($profil->deskripsi), 200) : 'Media digital untuk mendokumentasikan dan menyebarkan informasi adat serta budaya Desa Poto agar tetap lestari dan mudah diakses masyarakat.' }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('informasi.index') }}" class="btn-woody py-3.5 px-7 text-sm font-medium uppercase">Jelajahi Informasi Adat <svg class="h-4 w-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
                        <a href="{{ route('profil') }}" class="btn-woody-light py-3.5 px-7 text-sm font-medium uppercase">Tentang Desa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Hero End --}}

    {{-- Feature Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-16">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center justify-center bg-[#F5F5F5] w-[60px] h-[60px]">
                        <svg class="h-6 w-6 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <span class="text-5xl sm:text-6xl text-stone-200 font-heading font-black">01</span>
                </div>
                <h5 class="font-heading font-bold text-lg text-stone-700 mt-2">Informasi Adat</h5>
                <p class="text-sm text-stone-500 mt-1">Dokumentasi adat istiadat dan budaya desa.</p>
            </div>
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center justify-center bg-[#F5F5F5] w-[60px] h-[60px]">
                        <svg class="h-6 w-6 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/></svg>
                    </div>
                    <span class="text-5xl sm:text-6xl text-stone-200 font-heading font-black">02</span>
                </div>
                <h5 class="font-heading font-bold text-lg text-stone-700 mt-2">Kegiatan Adat</h5>
                <p class="text-sm text-stone-500 mt-1">Jadwal dan dokumentasi kegiatan budaya.</p>
            </div>
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center justify-center bg-[#F5F5F5] w-[60px] h-[60px]">
                        <svg class="h-6 w-6 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <span class="text-5xl sm:text-6xl text-stone-200 font-heading font-black">03</span>
                </div>
                <h5 class="font-heading font-bold text-lg text-stone-700 mt-2">Struktur Organisasi</h5>
                <p class="text-sm text-stone-500 mt-1">Pengurus adat yang melestarikan tradisi.</p>
            </div>
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center justify-center bg-[#F5F5F5] w-[60px] h-[60px]">
                        <svg class="h-6 w-6 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <span class="text-5xl sm:text-6xl text-stone-200 font-heading font-black">04</span>
                </div>
                <h5 class="font-heading font-bold text-lg text-stone-700 mt-2">Galeri Budaya</h5>
                <p class="text-sm text-stone-500 mt-1">Dokumentasi foto kegiatan adat.</p>
            </div>
        </div>
    </div>
    {{-- Feature End --}}

    {{-- About Start --}}
    <div class="bg-[#F5F5F5] overflow-hidden my-16">
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
                <div class="lg:w-1/2 py-16 px-6 lg:px-16">
                    <div class="section-title text-start">
                        <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-4">Tentang Kami</h1>
                    </div>
                    <p class="text-stone-600 font-sans leading-relaxed mb-6">Sistem Informasi Adat Desa Poto adalah platform digital yang bertujuan untuk mendokumentasikan, melestarikan, dan menyebarluaskan informasi mengenai adat istiadat serta budaya yang ada di Desa Poto, Kecamatan Moyo Hilir, Kabupaten Sumbawa.</p>
                    <a href="{{ route('profil') }}" class="btn-woody py-3.5 px-7 text-sm font-medium uppercase">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    {{-- About End --}}

    {{-- Informasi Adat (Service) Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <div class="section-title text-center">
            <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-8">Informasi Adat Terbaru</h1>
        </div>
        @if ($informasiTerbaru->isEmpty())
            <p class="text-center text-stone-500 mt-8">Belum ada informasi adat yang dipublikasikan.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-4 auto-rows-fr">
                @foreach ($informasiTerbaru as $item)
                    <a href="{{ route('informasi.show', $item) }}" class="service-item group flex flex-col h-full">
                        <div class="overflow-hidden">
                            @if ($item->gambar)
                                <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 sm:h-56 object-cover" loading="lazy">
                            @else
                                <div class="w-full h-48 sm:h-56 bg-stone-100 flex items-center justify-center text-stone-300">
                                    <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2" stroke-width="1.8"/><circle cx="8.5" cy="9.5" r="1.5" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m4 17 5-5 4 4 3-3 4 4"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 text-center border-[5px] border-[#F5F5F5] border-t-0 flex flex-col flex-1">
                            <span class="text-[#AB7442] font-sans font-medium text-sm">{{ $item->kategori }}</span>
                            <h4 class="font-heading font-bold text-lg text-stone-700 my-2">{{ $item->judul }}</h4>
                            <p class="text-sm text-stone-500 flex-1">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('informasi.index') }}" class="btn-woody py-3.5 px-7 text-sm font-medium uppercase">Lihat Semua <svg class="h-4 w-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
            </div>
        @endif
    </div>
    {{-- Informasi Adat End --}}

    {{-- Kegiatan Adat (Feature/Quote) Start --}}
    <div class="bg-[#F5F5F5] overflow-hidden my-12 lg:my-16">
        <div class="max-w-7xl mx-auto px-0 lg:px-0">
            <div class="flex flex-col lg:flex-row-reverse mx-0">
                <div class="lg:w-1/2 pe-0 min-h-[250px] lg:min-h-[400px]">
                    <div class="relative h-full w-full bg-stone-200 flex items-center justify-center p-8 lg:p-12">
                        <div class="text-center">
                            <div class="w-[80px] h-[80px] mx-auto bg-white flex items-center justify-center rounded-full mb-4">
                                <svg class="h-8 w-8 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 21V5a2 2 0 0 1 2-2h7l5 5v13M14 3v5h5M9 13h6M9 17h4"/></svg>
                            </div>
                            <h3 class="font-heading font-bold text-2xl text-stone-700">Kegiatan Adat</h3>
                            <p class="text-stone-500 mt-2 max-w-xs">Jadwal dan dokumentasi kegiatan</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 py-10 lg:py-16 px-6 lg:px-16">
                    <div class="section-title text-start">
                        <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-4">Kegiatan Adat</h1>
                    </div>
                    @if ($kegiatanTerbaru->isEmpty())
                        <p class="text-stone-500">Belum ada kegiatan adat yang dijadwalkan.</p>
                    @else
                        <div class="grid gap-4 sm:grid-cols-2">
                            @foreach ($kegiatanTerbaru->take(4) as $kegiatan)
                                <a href="{{ route('kegiatan.show', $kegiatan) }}" class="flex items-center gap-3 bg-white p-4 transition hover:shadow-sm">
                                    <div class="flex-shrink-0 w-[60px] h-[60px] bg-white flex items-center justify-center">
                                        <svg class="h-5 w-5 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/></svg>
                                    </div>
                                    <div>
                                        <h5 class="font-heading font-bold text-stone-700 text-sm">{{ $kegiatan->judul }}</h5>
                                        <p class="text-xs text-stone-500">{{ $kegiatan->tanggal_kegiatan->translatedFormat('d F Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('kegiatan.index') }}" class="btn-woody py-3.5 px-7 text-sm font-medium uppercase mt-6 inline-flex">Lihat Semua <svg class="h-4 w-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Kegiatan Adat End --}}

    {{-- Galeri (Portfolio) Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <div class="section-title text-center">
            <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-8">Galeri Terbaru</h1>
        </div>
        @if ($galeriTerbaru->isEmpty())
            <p class="text-center text-stone-500">Belum ada dokumentasi yang tersedia.</p>
        @else
            <div class="grid gap-6 grid-cols-2 sm:grid-cols-3 lg:grid-cols-6">
                @foreach ($galeriTerbaru as $foto)
                    <div class="portfolio-item rounded overflow-hidden group">
                        <div class="relative overflow-hidden">
                            <img src="{{ Storage::url($foto->gambar) }}" alt="{{ $foto->judul }}" class="w-full aspect-square object-cover" loading="lazy">
                            <div class="portfolio-overlay">
                                <div class="btn-square btn-outline text-white border border-white hover:bg-[#AB7442] hover:border-[#AB7442] transition mx-1">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('galeri') }}" class="btn-woody py-3.5 px-7 text-sm font-medium uppercase">Lihat Semua <svg class="h-4 w-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
            </div>
        @endif
    </div>
    {{-- Galeri End --}}

@endsection
