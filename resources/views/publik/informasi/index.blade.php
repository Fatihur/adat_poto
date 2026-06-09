@extends('layouts.publik')

@section('judul', 'Informasi Adat')

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">Informasi Adat</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Informasi Adat</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    {{-- Service Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        {{-- Search & Filter --}}
        <form method="GET" class="flex flex-col sm:flex-row gap-3 mb-10">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400 pointer-events-none">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="m20 20-3.5-3.5"/></svg>
                </div>
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari informasi adat..." class="form-control-woody bg-[#F5F5F5] pl-10">
            </div>
            <select name="kategori" class="form-control-woody bg-[#F5F5F5] sm:w-48">
                <option value="">Semua Kategori</option>
                @foreach ($kategoriList as $k)
                    <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected' : '' }}>{{ $k }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-woody py-3.5 px-6 text-sm font-medium">Cari</button>
            @if (request()->hasAny(['cari', 'kategori']))
                <a href="{{ route('informasi.index') }}" class="btn-woody-outline py-3.5 px-6 text-sm font-medium">Reset</a>
            @endif
        </form>

        @if ($daftarInformasi->isEmpty())
            <p class="text-center text-stone-500 py-16">
                @if (request()->hasAny(['cari', 'kategori']))
                    Tidak ditemukan informasi adat yang sesuai dengan pencarian.
                @else
                    Belum ada informasi adat yang dipublikasikan.
                @endif
            </p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 auto-rows-fr">
                @foreach ($daftarInformasi as $item)
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
                            <p class="text-sm text-stone-500 flex-1">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                            <p class="mt-3 text-xs text-stone-400">{{ $item->updated_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-10">{{ $daftarInformasi->withQueryString()->links() }}</div>
        @endif
    </div>
    {{-- Service End --}}
@endsection
