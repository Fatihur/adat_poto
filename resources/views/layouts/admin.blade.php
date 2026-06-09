<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Dashboard') — Admin {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-100 text-stone-800 antialiased" x-data="{ sidebar: false }">

    @php
        $menuAdmin = [
            ['admin.dashboard', 'Dashboard', 'beranda'],
            ['admin.profil.index', 'Profil Desa', 'profil'],
            ['admin.informasi.index', 'Informasi Adat', 'dokumen'],
            ['admin.pengurus.index', 'Struktur Organisasi', 'grup'],
            ['admin.kegiatan.index', 'Kegiatan Adat', 'kegiatan'],
            ['admin.galeri.index', 'Galeri', 'gambar'],
            ['admin.komentar.index', 'Komentar', 'chat'],
            ['admin.notifikasi.index', 'Notifikasi', 'lonceng'],
        ];

        $notifBelumDibaca = \App\Models\Notifikasi::belumDibaca()->count();
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-40 w-64 transform bg-amber-900 text-amber-50 transition-transform duration-200 ease-out md:translate-x-0"
               :class="sidebar ? 'translate-x-0' : '-translate-x-full'">
            <div class="flex h-16 items-center gap-2 border-b border-amber-800 px-6 font-bold tracking-tight">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-50 text-amber-900 font-extrabold">AP</span>
                <span>Admin Panel</span>
            </div>
            <nav class="mt-4 space-y-1 px-3">
                @foreach ($menuAdmin as [$rute, $label, $ikon])
                    @php $aktif = request()->routeIs(str_replace('.index', '.*', $rute)) || request()->routeIs($rute); @endphp
                    <a href="{{ route($rute) }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition hover:bg-amber-800 {{ $aktif ? 'bg-amber-800 ring-1 ring-amber-700/50' : '' }}">
                        <x-icon :name="$ikon" class="h-5 w-5 shrink-0" />
                        <span class="flex-1">{{ $label }}</span>
                        @if ($label === 'Notifikasi' && $notifBelumDibaca > 0)
                            <span class="inline-flex items-center justify-center h-5 min-w-[20px] rounded-full bg-rose-500 px-1.5 text-[10px] font-bold text-white">{{ $notifBelumDibaca > 99 ? '99+' : $notifBelumDibaca }}</span>
                        @endif
                    </a>
                @endforeach
            </nav>
            <div class="absolute inset-x-0 bottom-0 border-t border-amber-800 p-3">
                <div class="mb-2 px-3 pb-2 border-b border-amber-800 text-xs text-amber-200/60">
                    {{ auth()->user()?->nama }}
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-amber-100 transition hover:bg-amber-800">
                        <x-icon name="keluar" class="h-5 w-5 shrink-0" /> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Overlay mobile --}}
        <div x-show="sidebar" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebar = false" class="fixed inset-0 z-30 bg-black/40 md:hidden"></div>

        {{-- Konten --}}
        <div class="flex-1 md:ml-64">
            <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-stone-200 bg-white/95 backdrop-blur-sm px-4 sm:px-6">
                <button @click="sidebar = !sidebar" class="md:hidden rounded-md p-2 hover:bg-stone-100 transition" aria-label="Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-lg font-semibold text-stone-900">@yield('judul', 'Dashboard')</h1>
                <div class="flex items-center gap-3">
                    <a href="{{ route('beranda') }}" target="_blank" class="hidden btn-ghost sm:inline-flex text-xs uppercase tracking-wider">Lihat Situs</a>
                </div>
            </header>

            <main class="p-4 sm:p-6 lg:p-8">
                <x-flash />
                @yield('konten')
            </main>
        </div>
    </div>

</body>
</html>