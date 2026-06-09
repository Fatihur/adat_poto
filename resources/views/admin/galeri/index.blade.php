@extends('layouts.admin')

@section('judul', 'Galeri')

@section('konten')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-stone-900">Kelola Galeri</h2>
        <a href="{{ route('admin.galeri.create') }}" class="btn-primary">+ Tambah</a>
    </div>

    <div class="mt-6">
        <input type="text" id="galeri-search" placeholder="Cari galeri..."
               class="mb-4 w-full sm:w-72 border border-stone-300 rounded-lg px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-[#AB7442]/30 focus:border-[#AB7442]">

        @if ($daftarGaleri->isEmpty())
            <div class="rounded-xl bg-white p-8 text-center text-stone-500 shadow-sm ring-1 ring-stone-200">Belum ada foto galeri.</div>
        @else
            <div id="galeri-grid" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($daftarGaleri as $foto)
                    <div class="galeri-item group overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-stone-200 transition-all hover:shadow-md"
                         data-judul="{{ strtolower($foto->judul) }} {{ strtolower($foto->kegiatan?->judul ?? '') }}">
                        <div class="aspect-square bg-stone-100 overflow-hidden">
                            <img src="{{ Storage::url($foto->gambar) }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" alt="{{ $foto->judul }}" loading="lazy">
                        </div>
                        <div class="p-4">
                            <p class="truncate font-medium text-stone-800">{{ $foto->judul }}</p>
                            @if ($foto->kegiatan)
                                <p class="mt-0.5 flex items-center gap-1 text-xs text-stone-400"><x-icon name="kegiatan" class="h-3.5 w-3.5 shrink-0" /> {{ $foto->kegiatan->judul }}</p>
                            @endif
                            <div class="mt-3 flex items-center gap-1">
                                <a href="{{ route('admin.galeri.edit', $foto) }}" class="btn-ghost">Edit</a>
                                <x-hapus-form :action="route('admin.galeri.destroy', $foto)" pesan="Hapus foto ini?" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection