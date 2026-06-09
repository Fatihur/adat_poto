@php $galeri ??= null; @endphp

<div class="space-y-5">
    <div>
        <label for="judul" class="label">Judul <span class="text-red-500">*</span></label>
        <input id="judul" name="judul" type="text" value="{{ old('judul', $galeri->judul ?? '') }}" required
               class="mt-1.5 input">
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="kegiatan_id" class="label">Kegiatan Terkait</label>
            @php $kegiatanTerpilih = old('kegiatan_id', $galeri->kegiatan_id ?? ''); @endphp
            <select id="kegiatan_id" name="kegiatan_id" class="mt-1.5 select">
                <option value="">— Tidak terkait —</option>
                @foreach ($daftarKegiatan as $kegiatan)
                    <option value="{{ $kegiatan->id }}" @selected((string) $kegiatanTerpilih === (string) $kegiatan->id)>{{ $kegiatan->judul }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tanggal_dokumentasi" class="label">Tanggal Dokumentasi</label>
            <input id="tanggal_dokumentasi" name="tanggal_dokumentasi" type="date"
                   value="{{ old('tanggal_dokumentasi', optional($galeri?->tanggal_dokumentasi)->format('Y-m-d')) }}"
                   class="mt-1.5 input">
        </div>
    </div>

    <div>
        <label for="deskripsi" class="label">Deskripsi</label>
        <input type="hidden" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $galeri->deskripsi ?? '') }}">
        <div class="quill-editor mt-1.5" data-input="deskripsi" style="min-height:150px"></div>
    </div>

    <div>
        <label for="gambar" class="label">
            Foto @if (! $galeri)<span class="text-red-500">*</span>@endif
        </label>
        @if ($galeri?->gambar)
            <img src="{{ Storage::url($galeri->gambar) }}" class="mt-2 h-32 rounded-lg object-cover ring-1 ring-stone-200" alt="">
        @endif
        <input id="gambar" name="gambar" type="file" accept=".jpg,.jpeg,.png,.webp" @if (! $galeri) required @endif
               class="mt-2 block w-full text-sm text-stone-600 file:mr-3 file:rounded-md file:border-0 file:bg-amber-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-amber-800 hover:file:bg-amber-200">
        <p class="mt-1 text-xs text-stone-400">Format JPG, JPEG, PNG, WebP. Maksimal 4 MB.</p>
    </div>
</div>
