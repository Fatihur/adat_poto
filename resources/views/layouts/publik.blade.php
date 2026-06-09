<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Beranda') — {{ config('app.name') }}</title>
    <meta name="description" content="Sistem Informasi Adat Desa Poto — dokumentasi dan informasi adat budaya Desa Poto.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @php
        $menu = [
            ['beranda', 'Beranda'],
            ['profil', 'Profil'],
            ['informasi.index', 'Informasi Adat'],
            ['struktur', 'Struktur'],
            ['kegiatan.index', 'Kegiatan'],
            ['galeri', 'Galeri'],
        ];
    @endphp

    {{-- Spinner --}}
    <div x-data="{ loading: true }" x-init="window.addEventListener('load', () => setTimeout(() => loading = false, 100))"
         x-show="loading"
         class="fixed inset-0 z-[99999] flex items-center justify-center bg-white"
         x-transition:leave="transition-opacity duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="w-12 h-12 rounded-full border-4 border-[#AB7442] border-t-transparent animate-spin" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    {{-- Topbar --}}


    {{-- Navbar --}}
    <nav x-data="{ buka: false, scroll: false }"
         x-init="window.addEventListener('scroll', () => scroll = window.scrollY > 300)"
         class="sticky top-0 z-40 bg-white transition-all duration-500"
         :class="scroll ? 'shadow-sm' : ''">
        <div class="mx-auto max-w-7xl px-4 lg:px-5 flex items-center justify-between h-auto">
            <a href="{{ route('beranda') }}" class="flex items-center h-[75px] px-0 lg:px-5">
                <span class="text-[#AB7442] font-heading font-black text-2xl tracking-tight">AP</span>
                <span class="ml-2 text-stone-700 font-heading font-medium text-lg">Adat Desa Poto</span>
            </a>

            <button @click="buka = !buka" class="lg:hidden me-2 p-3 text-stone-600 hover:text-[#AB7442] transition" aria-label="Menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>

            <div class="hidden lg:flex items-center ms-auto">
                @foreach ($menu as [$rute, $label])
                    @php $aktif = request()->routeIs($rute) || request()->routeIs(str_replace('.index', '*', $rute)); @endphp
                    <a href="{{ route($rute) }}"
                       class="nav-link font-sans text-[15px] font-medium uppercase tracking-normal px-0 py-[25px] mx-[15px] transition"
                       :class="scroll ? 'text-stone-600' : 'text-stone-600'"
                       style="{{ $aktif ? 'color: #AB7442;' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
                <a href="{{ route('admin.login') }}" class="btn-woody py-4 px-6 text-sm font-medium uppercase hidden xl:inline-flex ms-3">
                    Login Admin
                    <svg class="h-4 w-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H4m0 0 3.5-3.5M4 12l3.5 3.5M14 4h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-4"/></svg>
                </a>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="buka" x-cloak
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden border-t border-stone-200">
            <div class="px-4 py-4 space-y-1">
                @foreach ($menu as [$rute, $label])
                    @php $aktif = request()->routeIs($rute) || request()->routeIs(str_replace('.index', '*', $rute)); @endphp
                    <a href="{{ route($rute) }}" class="block py-3 text-[15px] font-medium uppercase transition" style="{{ $aktif ? 'color: #AB7442;' : 'color: #353535;' }}">{{ $label }}</a>
                @endforeach
                <a href="{{ route('admin.login') }}" class="btn-woody py-3 px-5 mt-3 text-sm font-medium uppercase w-full justify-center">
                    Login Admin
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H4m0 0 3.5-3.5M4 12l3.5 3.5M14 4h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-4"/></svg>
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-1">
        @yield('konten')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#353535] text-white footer-woody">
        <div class="mx-auto max-w-7xl px-4 lg:px-5 py-12 lg:py-16">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h4 class="text-white font-heading font-bold text-lg mb-4">Alamat</h4>
                    <p class="mb-2 text-stone-300 text-[15px] flex items-start gap-3">
                        <svg class="h-4 w-4 mt-1 shrink-0 text-[#AB7442]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Desa Poto, Kecamatan Moyo Hilir, Kabupaten Sumbawa
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-heading font-bold text-lg mb-4">Navigasi</h4>
                    @foreach ($menu as [$rute, $label])
                        <a href="{{ route($rute) }}" class="btn-link block mb-2 text-[15px] text-stone-300 hover:text-[#AB7442] transition hover:tracking-wider no-underline">&#8250; {{ $label }}</a>
                    @endforeach
                </div>
                <div>
                    <h4 class="text-white font-heading font-bold text-lg mb-4">Tautan Cepat</h4>
                    <a href="{{ route('beranda') }}" class="btn-link block mb-2 text-[15px] text-stone-300 hover:text-[#AB7442] transition hover:tracking-wider no-underline">&#8250; Beranda</a>
                    <a href="{{ route('profil') }}" class="btn-link block mb-2 text-[15px] text-stone-300 hover:text-[#AB7442] transition hover:tracking-wider no-underline">&#8250; Profil Desa</a>
                    <a href="{{ route('informasi.index') }}" class="btn-link block mb-2 text-[15px] text-stone-300 hover:text-[#AB7442] transition hover:tracking-wider no-underline">&#8250; Informasi Adat</a>
                    <a href="{{ route('galeri') }}" class="btn-link block mb-2 text-[15px] text-stone-300 hover:text-[#AB7442] transition hover:tracking-wider no-underline">&#8250; Galeri</a>
                </div>
                <div>
                    <h4 class="text-white font-heading font-bold text-lg mb-4">Tentang</h4>
                    <p class="text-stone-400 text-[15px] leading-relaxed">Sistem Informasi Adat Desa Poto dikembangkan untuk mendukung pelestarian budaya lokal melalui dokumentasi digital yang terorganisir.</p>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-5">
            <div class="copyright flex flex-col sm:flex-row items-center justify-between gap-3 text-stone-400 text-[15px]">
                <p>&copy; {{ date('Y') }} <a href="#" class="text-white hover:text-[#AB7442] transition border-b border-white/20">Desa Poto</a>, All Right Reserved.</p>
                <p>Dibangun untuk mendukung pelestarian budaya lokal.</p>
            </div>
        </div>
    </footer>

    {{-- Back to Top --}}
    <button x-data="{ tampil: false }"
            x-init="window.addEventListener('scroll', () => tampil = window.scrollY > 300)"
            x-show="tampil"
            x-cloak
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed bottom-[45px] right-[45px] z-50 btn-lg-square bg-[#AB7442] text-white hover:bg-[#8B5E34] transition shadow-lg"
            aria-label="Kembali ke atas">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

    @stack('scripts')
</body>
</html>
