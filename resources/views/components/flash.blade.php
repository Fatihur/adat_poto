@if (session('sukses'))
    <div x-data="{ tampil: true }" x-show="tampil" x-init="setTimeout(() => tampil = false, 5000)"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="mb-4 flex items-start justify-between gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-sm">
        <span>{{ session('sukses') }}</span>
        <button @click="tampil = false" class="text-green-600 hover:text-green-800 transition">&times;</button>
    </div>
@endif

@if (session('gagal'))
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-sm">
        {{ session('gagal') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-sm">
        <p class="font-semibold">Periksa kembali isian berikut:</p>
        <ul class="mt-1 list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $pesan)
                <li>{{ $pesan }}</li>
            @endforeach
        </ul>
    </div>
@endif