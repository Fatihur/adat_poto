@props(['name', 'class' => 'h-5 w-5'])

@php
    $paths = [
        'kalender' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/>',
        'lokasi' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5" stroke-width="1.8"/>',
        'gambar' => '<rect x="3" y="4" width="18" height="16" rx="2" stroke-width="1.8"/><circle cx="8.5" cy="9.5" r="1.5" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m4 17 5-5 4 4 3-3 4 4"/>',
        'pengguna' => '<circle cx="12" cy="8" r="3.5" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 20a7 7 0 0 1 14 0"/>',
        'beranda' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 11.5 12 4l9 7.5M5 10v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-9"/>',
        'profil' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 21V8l8-5 8 5v13M9 21v-6h6v6"/>',
        'dokumen' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h7l5 5v13a0 0 0 0 1 0 0H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 3v6h6M9 13h6M9 17h6"/>',
        'grup' => '<circle cx="9" cy="8" r="3" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 20a6 6 0 0 1 12 0M16 6a3 3 0 0 1 0 6m1 8a6 6 0 0 0-3-5.2"/>',
        'kegiatan' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 21V5a2 2 0 0 1 2-2h7l5 5v13M14 3v5h5M9 13h6M9 17h4"/>',
        'keluar' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12H4m0 0 3.5-3.5M4 12l3.5 3.5M14 4h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-4"/>',
        'cari' => '<circle cx="11" cy="11" r="7" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="m20 20-3.5-3.5"/>',
        'chat' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
        'lonceng' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>',
    ];
@endphp

<svg {{ $attributes->merge(['class' => $class]) }} fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
    {!! $paths[$name] ?? '' !!}
</svg>
