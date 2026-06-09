@extends('layouts.admin')

@section('judul', 'Tambah Foto Galeri')

@section('konten')
    <nav class="flex items-center gap-2 text-sm text-stone-500 mb-4">
        <a href="{{ route('admin.galeri.index') }}" class="hover:text-amber-800 transition">Galeri</a>
        <span class="text-stone-300">/</span>
        <span class="text-stone-800 font-medium">Tambah</span>
    </nav>

    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data"
              class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-stone-200">
            @csrf
            @include('admin.galeri._form')
            <div class="mt-6 flex gap-3 pt-4 border-t border-stone-100">
                <button type="submit" class="btn-primary">Simpan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
@endsection
