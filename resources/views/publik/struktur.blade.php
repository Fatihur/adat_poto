@extends('layouts.publik')

@section('judul', 'Struktur Organisasi Adat')

@section('konten')
    {{-- Page Header Start --}}
    <div class="page-header-woody py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-heading font-black mb-3">Struktur Organisasi Adat</h1>
            <nav aria-label="breadcrumb">
                <ol class="flex items-center gap-2 text-white/80 text-sm">
                    <li><a href="{{ route('beranda') }}" class="text-white hover:text-[#AB7442] transition">Beranda</a></li>
                    <li class="before:content-['/'] before:me-2 text-white">Struktur</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Page Header End --}}

    {{-- Tree Start --}}
    <div class="max-w-7xl mx-auto px-4 lg:px-5 py-12 lg:py-16">
        <div class="section-title text-center">
            <h1 class="text-4xl sm:text-[42px] font-heading font-black text-stone-700 mb-8">Struktur Kepengurusan</h1>
        </div>
        @if ($daftarPengurus->isEmpty())
            <p class="text-center text-stone-500 py-16">Data struktur organisasi belum tersedia.</p>
        @else
            @php
                $root = $daftarPengurus->shift();
                $children = $daftarPengurus;
                $total = $children->count();
            @endphp

            {{-- Root Node --}}
            <div class="flex justify-center mb-0">
                <div class="relative px-8 py-5 rounded-xl bg-[#AB7442] text-white text-center shadow-lg">
                    <p class="font-heading font-bold text-xl">{{ $root->nama }}</p>
                    <p class="text-sm text-white/80 mt-0.5">{{ $root->jabatan }}</p>
                </div>
            </div>

            {{-- Vertical line from root --}}
            <div class="flex justify-center h-10">
                <div class="w-0.5 bg-[#AB7442]/40"></div>
            </div>

            {{-- Horizontal line connecting children --}}
            <div class="relative">
                @if ($total > 0)
                    <div class="absolute left-[10%] right-[10%] top-0 h-0.5 bg-[#AB7442]/40 hidden sm:block"></div>
                @endif

                {{-- Horizontal connector --}}
            <div class="tree-connector-h mx-auto max-w-[80%] mb-0"></div>

            {{-- Children container with flex for connector lines --}}
            <div class="relative">
                <div class="flex justify-center gap-6 sm:gap-8 lg:gap-10 flex-wrap px-4">
                    @foreach ($children as $pengurus)
                        <div class="flex flex-col items-center pt-0 sm:pt-0 min-w-[160px]">
                            <div class="tree-node-v"></div>
                            <div class="w-full px-5 py-4 rounded-xl border-2 border-stone-200 bg-white text-center shadow-sm hover:border-[#AB7442]/40 hover:shadow-md transition-all">
                                <p class="font-heading font-bold text-stone-800 text-base">{{ $pengurus->nama }}</p>
                                <p class="text-sm text-stone-500 mt-0.5">{{ $pengurus->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        @endif
    </div>
    {{-- Tree End --}}
@endsection
