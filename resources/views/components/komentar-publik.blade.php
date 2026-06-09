@props(['type', 'model'])

@php
    $user = request()->user('pengguna');
    $komentars = $model->rootComments()
        ->where('status', 'terbit')
        ->with(['replies' => function ($q) {
            $q->where('status', 'terbit');
        }, 'replies.commenter', 'commenter', 'likes'])
        ->latest()
        ->get();
@endphp

<div class="mt-16">
    <h2 class="font-heading font-black text-2xl text-stone-700 mb-8">Diskusi ({{ $komentars->count() }})</h2>

    {{-- Prompt Login / Form Komentar --}}
    @if ($user)
        <div class="mb-10 rounded-xl border border-stone-200 bg-white p-6">
            <h3 class="font-heading font-bold text-lg text-stone-700 mb-4">Tulis Komentar</h3>
            <form method="POST" action="{{ route('komentar.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="id" value="{{ $model->id }}">
                <input type="hidden" name="parent_id" id="parent_id" value="">

                <div class="flex items-center gap-3 mb-4">
                    @if ($user->avatar)
                        <img src="{{ $user->avatar }}" alt="" class="w-10 h-10 rounded-full">
                    @else
                        <div class="w-10 h-10 rounded-full bg-[#AB7442]/10 flex items-center justify-center text-[#AB7442] font-bold text-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <p class="text-sm font-medium text-stone-800">{{ $user->name }}</p>
                        <p class="text-xs text-stone-400">{{ $user->email }}</p>
                    </div>
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
    @else
        <div class="mb-10 rounded-xl border border-stone-200 bg-white p-8 text-center">
            <svg class="h-12 w-12 mx-auto text-stone-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            <h3 class="font-heading font-bold text-lg text-stone-700 mb-2">Bergabung dalam Diskusi</h3>
            <p class="text-stone-500 text-sm mb-6">Login dengan Google untuk berkomentar dan berdiskusi.</p>
            <a href="{{ route('google.login') }}"
               class="inline-flex items-center gap-3 rounded-lg border border-stone-300 bg-white px-6 py-3 text-sm font-medium text-stone-700 shadow-sm transition hover:bg-stone-50 hover:shadow-md">
                <svg class="h-5 w-5" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Login dengan Google
            </a>
        </div>
    @endif

    {{-- Daftar Komentar --}}
    @if ($komentars->isEmpty())
        <p class="text-center text-stone-400 py-10">Belum ada diskusi. Jadilah yang pertama!</p>
    @else
        <div class="space-y-6">
            @foreach ($komentars as $komentar)
                <div class="rounded-xl border border-stone-200 bg-white p-5">
                    <div class="flex items-start gap-3">
                        {{-- Avatar --}}
                        @if ($komentar->avatar_pengirim)
                            <img src="{{ $komentar->avatar_pengirim }}" alt="" class="flex-shrink-0 w-10 h-10 rounded-full">
                        @else
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#AB7442]/10 flex items-center justify-center text-[#AB7442] font-bold text-sm">
                                {{ strtoupper(substr($komentar->nama_pengirim, 0, 1)) }}
                            </div>
                        @endif

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-medium text-stone-800 text-sm">{{ $komentar->nama_pengirim }}</span>
                                <span class="text-xs text-stone-400">{{ $komentar->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mt-1.5 text-sm text-stone-600 leading-relaxed">{{ $komentar->body }}</p>

                            <div class="mt-2 flex items-center gap-3">
                                {{-- Tombol Like --}}
                                <div class="flex items-center gap-1">
                                    @if ($user)
                                        <button type="button" onclick="likeKomentar({{ $komentar->id }}, this)"
                                                class="inline-flex items-center gap-1 text-xs transition
                                                {{ $komentar->isLikedBy($user) ? 'text-red-500' : 'text-stone-400 hover:text-red-400' }}">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="{{ $komentar->isLikedBy($user) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                            <span class="like-count">{{ $komentar->totalLikes() }}</span>
                                        </button>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-xs text-stone-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                            <span>{{ $komentar->totalLikes() }}</span>
                                        </span>
                                    @endif
                                </div>

                                {{-- Tombol Balas --}}
                                @if ($user)
                                    <button type="button" onclick="balas('{{ $komentar->id }}', '{{ $komentar->nama_pengirim }}')"
                                            class="text-xs text-[#AB7442] hover:underline font-medium">Balas</button>
                                @endif
                            </div>

                            {{-- Replies --}}
                            @if ($komentar->replies->isNotEmpty())
                                <div class="mt-4 space-y-3 pl-4 border-l-2 border-stone-100">
                                    @foreach ($komentar->replies as $reply)
                                        <div class="flex items-start gap-3">
                                            @if ($reply->avatar_pengirim)
                                                <img src="{{ $reply->avatar_pengirim }}" alt="" class="flex-shrink-0 w-8 h-8 rounded-full">
                                            @else
                                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-500 font-bold text-xs">
                                                    {{ strtoupper(substr($reply->nama_pengirim, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 flex-wrap">
                                                    <span class="font-medium text-stone-800 text-sm">{{ $reply->nama_pengirim }}</span>
                                                    <span class="text-xs text-stone-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="mt-1 text-sm text-stone-600 leading-relaxed">{{ $reply->body }}</p>
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

    function likeKomentar(id, btn) {
        fetch('/like/' + id, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            }
        })
        .then(async r => {
            if (!r.ok) {
                if (r.status === 401) {
                    window.location.href = '{{ route('google.login') }}';
                    return null;
                }
                if (r.status === 419) {
                    alert('Sesi telah habis. Silakan muat ulang halaman.');
                    return null;
                }
                const text = await r.text();
                throw new Error(text);
            }
            return r.json();
        })
        .then(data => {
            if (!data) return;
            const svg = btn.querySelector('svg');
            const count = btn.querySelector('.like-count');
            if (data.liked) {
                svg.setAttribute('fill', 'currentColor');
                btn.classList.remove('text-stone-400', 'hover:text-red-400');
                btn.classList.add('text-red-500');
            } else {
                svg.setAttribute('fill', 'none');
                btn.classList.remove('text-red-500');
                btn.classList.add('text-stone-400', 'hover:text-red-400');
            }
            count.textContent = data.total;
        })
        .catch(() => {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }
</script>
