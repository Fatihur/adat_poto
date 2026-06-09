@php $pengurus ??= null; @endphp

<div class="space-y-5">
    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="nama" class="label">Nama <span class="text-red-500">*</span></label>
            <input id="nama" name="nama" type="text" value="{{ old('nama', $pengurus->nama ?? '') }}" required
                   class="mt-1.5 input">
        </div>
        <div>
            <label for="jabatan" class="label">Jabatan <span class="text-red-500">*</span></label>
            <input id="jabatan" name="jabatan" type="text" value="{{ old('jabatan', $pengurus->jabatan ?? '') }}" required
                   class="mt-1.5 input">
        </div>
    </div>

    <div>
        <label for="urutan" class="label">Urutan Tampilan</label>
        <input id="urutan" name="urutan" type="number" min="0" value="{{ old('urutan', $pengurus->urutan ?? 0) }}"
               class="mt-1.5 input w-32">
        <p class="mt-1 text-xs text-stone-400">Angka lebih kecil tampil lebih dahulu.</p>
    </div>
</div>
