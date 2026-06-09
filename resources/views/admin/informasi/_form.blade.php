@php $informasi ??= null; @endphp

<div class="space-y-5">
    <div>
        <label for="judul" class="label">Judul <span class="text-red-500">*</span></label>
        <input id="judul" name="judul" type="text" value="{{ old('judul', $informasi->judul ?? '') }}" required
               class="mt-1.5 input">
    </div>

    <div>
        <label for="kategori" class="label">Kategori <span class="text-red-500">*</span></label>
        <input id="kategori" name="kategori" type="text" value="{{ old('kategori', $informasi->kategori ?? '') }}" required
               placeholder="Misal: Upacara, Perkawinan, Kesenian"
               class="mt-1.5 input">
    </div>

    <div>
        <label for="deskripsi" class="label">Deskripsi <span class="text-red-500">*</span></label>
        <input type="hidden" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $informasi->deskripsi ?? '') }}">
        <div class="quill-editor mt-1.5" data-input="deskripsi"></div>
    </div>

    <div>
        <label for="status" class="label">Status Publikasi <span class="text-red-500">*</span></label>
        @php $statusTerpilih = old('status', $informasi->status ?? 'terbit'); @endphp
        <select id="status" name="status" class="mt-1.5 select">
            <option value="terbit" @selected($statusTerpilih === 'terbit')>Terbit</option>
            <option value="draf" @selected($statusTerpilih === 'draf')>Draf</option>
        </select>
    </div>

    <div>
        <label for="gambar" class="block text-sm font-medium text-stone-700">Gambar</label>
        @if ($informasi?->gambar)
            <img src="{{ Storage::url($informasi->gambar) }}" class="mt-2 h-32 rounded-lg object-cover ring-1 ring-stone-200" alt="">
        @endif
        <input id="gambar" name="gambar" type="file" accept=".jpg,.jpeg,.png,.webp"
               class="mt-2 block w-full text-sm text-stone-600 file:mr-3 file:rounded-md file:border-0 file:bg-amber-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-amber-800 hover:file:bg-amber-200">
        <p class="mt-1 text-xs text-stone-400">Format JPG, JPEG, PNG, WebP. Maksimal 4 MB.</p>
    </div>
</div>
