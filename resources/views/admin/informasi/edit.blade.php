@extends('layouts.admin')

@section('judul', 'Edit Informasi Adat')

@section('konten')
    <nav class="flex items-center gap-2 text-sm text-stone-500 mb-4">
        <a href="{{ route('admin.informasi.index') }}" class="hover:text-amber-800 transition">Informasi Adat</a>
        <span class="text-stone-300">/</span>
        <span class="text-stone-800 font-medium">Edit</span>
    </nav>

    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.informasi.update', $informasi) }}" enctype="multipart/form-data"
              class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-stone-200">
            @csrf
            @method('PUT')
            @include('admin.informasi._form')
            <div class="mt-6 flex gap-3 pt-4 border-t border-stone-100">
                <button type="submit" class="btn-primary">Perbarui</button>
                <a href="{{ route('admin.informasi.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
@endsection
