@props(['type', 'model'])

@php
    $komentars = $model->rootComments()
        ->whereIn('status', ['terbit', 'disembunyikan'])
        ->with(['replies' => function ($q) {
            $q->whereIn('status', ['terbit', 'disembunyikan']);
        }])
        ->latest()
        ->get();
@endphp

<div class="mt-16">
    <h2 class="font-heading font-black text-2xl text-stone-700 mb-8">Diskusi ({{ $komentars->count() }})</h2>

    {{-- Toast Notifikasi --}}
    @if (session('success'))
        <div x-data="{ tampil: true }" x-show="tampil" x-init="setTimeout(() => tampil = false, 4000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="fixed bottom-6 right-6 z-50 flex items-center gap-3 max-w-sm rounded-xl border border-green-200 bg-white px-5 py-3.5 shadow-lg">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-sm font-medium text-stone-700 flex-1">{{ session('success') }}</p>
            <button @click="tampil = false" class="text-stone-400 hover:text-stone-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    {{-- Form Komentar --}}
    <div class="mb-10 rounded-xl border border-stone-200 bg-white p-6">
        <h3 class="font-heading font-bold text-lg text-stone-700 mb-4">Tulis Komentar</h3>
        <form method="POST" action="{{ route('komentar.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="id" value="{{ $model->id }}">
            <input type="hidden" name="parent_id" id="parent_id" value="">

            <div>
                <label for="nama" class="block text-sm font-medium text-stone-600 mb-1">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="nama" id="nama" required maxlength="100" value="{{ old('nama') }}"
                       class="w-full rounded-lg border border-stone-300 px-4 py-2.5 text-sm focus:border-[#AB7442] focus:ring-2 focus:ring-[#AB7442]/20 outline-none transition"
                       placeholder="Nama Anda">
                @error('nama')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-stone-600 mb-1">Komentar <span class="text-red-500">*</span></label>
                <textarea name="body" id="body" rows="4" required maxlength="2000"
                          class="w-full rounded-lg border border-stone-300 px-4 py-2.5 text-sm focus:border-[#AB7442] focus:ring-2 focus:ring-[#AB7442]/20 outline-none transition resize-y"
                          placeholder="Tulis komentar Anda...">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div id="balas-info" class="hidden text-sm text-stone-500 bg-stone-50 px-4 py-2 rounded-lg">
                Membalas komentar: <span id="balas-nama" class="font-medium text-stone-700"></span>
                <button type="button" onclick="batalBalas()" class="ml-2 text-[#AB7442] hover:underline">Batal</button>
            </div>

            <div>
                <button type="submit" class="btn-woody py-3 px-6 text-sm font-medium uppercase tracking-wider">
                    Kirim Komentar
                </button>
            </div>
        </form>
    </div>

    {{-- Daftar Komentar --}}
    @if ($komentars->isEmpty())
        <p class="text-center text-stone-400 py-10">Belum ada diskusi. Jadilah yang pertama!</p>
    @else
        <div class="space-y-6">
            @foreach ($komentars as $komentar)
                <div class="rounded-xl border border-stone-200 bg-white p-5">
                    <div class="flex items-start gap-3">
                        {{-- Inisial nama --}}
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#AB7442]/10 flex items-center justify-center text-[#AB7442] font-bold text-sm">
                            {{ strtoupper(substr($komentar->nama_pengirim, 0, 1)) }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-medium text-stone-800 text-sm">{{ $komentar->nama_pengirim }}</span>
                                <span class="text-xs text-stone-400">{{ $komentar->created_at->diffForHumans() }}</span>
                            </div>
                            @if ($komentar->status === 'disembunyikan')
                                <p class="mt-1.5 text-sm text-stone-400 italic">Komentar disembunyikan oleh admin</p>
                            @else
                                <p class="mt-1.5 text-sm text-stone-600 leading-relaxed">{{ $komentar->body }}</p>
                            @endif

                            <div class="mt-2 flex items-center gap-3">
                                {{-- Tombol Balas --}}
                                <button type="button" onclick="balas('{{ $komentar->id }}', '{{ $komentar->nama_pengirim }}')"
                                        class="text-xs text-[#AB7442] hover:underline font-medium">Balas</button>
                            </div>

                            {{-- Replies --}}
                            @if ($komentar->replies->isNotEmpty())
                                <div class="mt-4 space-y-3 pl-4 border-l-2 border-stone-100">
                                    @foreach ($komentar->replies as $reply)
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-500 font-bold text-xs">
                                                {{ strtoupper(substr($reply->nama_pengirim, 0, 1)) }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 flex-wrap">
                                                    <span class="font-medium text-stone-800 text-sm">{{ $reply->nama_pengirim }}</span>
                                                    <span class="text-xs text-stone-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                @if ($reply->status === 'disembunyikan')
                                                    <p class="mt-1 text-sm text-stone-400 italic">Komentar disembunyikan oleh admin</p>
                                                @else
                                                    <p class="mt-1 text-sm text-stone-600 leading-relaxed">{{ $reply->body }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function balas(id, nama) {
        document.getElementById('parent_id').value = id;
        document.getElementById('balas-nama').textContent = nama;
        document.getElementById('balas-info').classList.remove('hidden');
        document.getElementById('body').focus();
    }

    function batalBalas() {
        document.getElementById('parent_id').value = '';
        document.getElementById('balas-info').classList.add('hidden');
    }
</script>
