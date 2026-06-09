@php $kegiatan ??= null; @endphp

<div class="space-y-5">
    <div>
        <label for="judul" class="label">Judul Kegiatan <span class="text-red-500">*</span></label>
        <input id="judul" name="judul" type="text" value="{{ old('judul', $kegiatan->judul ?? '') }}" required
               class="mt-1.5 input">
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="tanggal_kegiatan" class="label">Tanggal <span class="text-red-500">*</span></label>
            <input id="tanggal_kegiatan" name="tanggal_kegiatan" type="date" required
                   value="{{ old('tanggal_kegiatan', optional($kegiatan?->tanggal_kegiatan)->format('Y-m-d')) }}"
                   class="mt-1.5 input">
        </div>
        <div>
            <label for="lokasi" class="label">Lokasi <span class="text-red-500">*</span></label>
            <input id="lokasi" name="lokasi" type="text" value="{{ old('lokasi', $kegiatan->lokasi ?? '') }}" required
                   class="mt-1.5 input">
        </div>
    </div>

    <div>
        <label for="status" class="label">Status Kegiatan <span class="text-red-500">*</span></label>
        @php $statusTerpilih = old('status', $kegiatan->status ?? 'akan_datang'); @endphp
        <select id="status" name="status" class="mt-1.5 select">
            <option value="akan_datang" @selected($statusTerpilih === 'akan_datang')>Akan Datang</option>
            <option value="berlangsung" @selected($statusTerpilih === 'berlangsung')>Sedang Berlangsung</option>
            <option value="selesai" @selected($statusTerpilih === 'selesai')>Selesai</option>
        </select>
    </div>

    <div>
        <label for="deskripsi" class="label">Deskripsi <span class="text-red-500">*</span></label>
        <input type="hidden" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}">
        <div class="quill-editor mt-1.5" data-input="deskripsi"></div>
    </div>

    <div>
        <label for="gambar" class="label">Gambar</label>
        @if ($kegiatan?->gambar)
            <img src="{{ Storage::url($kegiatan->gambar) }}" class="mt-2 h-32 rounded-lg object-cover ring-1 ring-stone-200" alt="">
        @endif
        <input id="gambar" name="gambar" type="file" accept=".jpg,.jpeg,.png,.webp"
               class="mt-2 block w-full text-sm text-stone-600 file:mr-3 file:rounded-md file:border-0 file:bg-amber-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-amber-800 hover:file:bg-amber-200">
        <p class="mt-1 text-xs text-stone-400">Format JPG, JPEG, PNG, WebP. Maksimal 4 MB.</p>
    </div>
</div>
