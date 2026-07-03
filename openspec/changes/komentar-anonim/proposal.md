## Why

Fitur komentar saat ini terlalu kompleks untuk kebutuhan sistem informasi desa adat. Sistem memakai plugin pihak ketiga (`x-laravel/commentable`), mewajibkan login Google OAuth, menyimpan data user di tabel terpisah, dan memiliki fitur likes yang tidak esensial. Kompleksitas ini bertentangan dengan PRD yang menyebut fitur komentar sebagai fitur **pendukung** (prioritas sedang) dengan desain sederhana: nama pengirim, isi komentar, dan status moderasi. Penyederhanaan akan membuat kode lebih mudah dikelola, mengurangi dependensi eksternal, dan menghilangkan gesekan bagi masyarakat yang hanya ingin berkomentar tanpa login.

## What Changes

- **BREAKING**: Hapus autentikasi Google OAuth untuk pengguna publik (`GoogleLoginController`, route, session guard `pengguna`)
- **BREAKING**: Hapus tabel `users` dan model `User` — komentar tidak lagi memerlukan identitas terautentikasi
- **BREAKING**: Hapus tabel `likes`, model `Like`, trait `HasLikes`, `LikeController`, dan notifikasi `KomentarDisukai` — fitur likes dihapus sepenuhnya
- **BREAKING**: Hapus dependensi package `x-laravel/commentable` — komentar dibangun ulang secara native tanpa plugin pihak ketiga
- **BREAKING**: Hapus notifikasi email (`KomentarDibalas`, `KomentarDisukai`) — diganti dengan notifikasi dashboard admin via tabel `notifikasi` yang tetap dipertahankan
- **BREAKING**: Hapus kolom `commenter_type` dan `commenter_id` dari tabel `comments` — diganti dengan kolom `nama` wajib diisi pengguna
- **BREAKING**: Hapus kolom `pengirim` dari tabel `comments` — diganti `nama`
- Struktur tabel `comments` baru: `id`, `commentable_type`, `commentable_id`, `parent_id`, `nama`, `body`, `status`, `created_at`, `updated_at`, `deleted_at`
- Komentar publik: form sederhana dengan input nama (wajib) dan isi komentar — tanpa login
- Balasan komentar (reply/threading) tetap dipertahankan melalui `parent_id`
- Moderasi admin (tampilkan/sembunyikan) tetap dipertahankan melalui kolom `status`
- Hapus package `laravel/socialite` dari composer.json
- Hapus konfigurasi Google OAuth dari `config/services.php`

## Capabilities

### New Capabilities
- `komentar-anonim`: Sistem komentar native tanpa autentikasi. Pengunjung mengisi nama dan komentar, admin memoderasi. Mendukung balasan bertingkat (threading).

### Modified Capabilities
<!-- Tidak ada spesifikasi existing yang dimodifikasi -->

## Impact

- **Model**: Hapus `User`, `Like`; buat ulang `Komentar` sebagai model native (tidak extends vendor); hapus trait `HasLikes`; `Notifikasi` tetap dipertahankan untuk dashboard admin
- **Controller**: Hapus `KomentarController` (publik lama), `LikeController`, `GoogleLoginController`, `Admin\KomentarController` (lama); buat ulang `KomentarController` (publik) dan `Admin\KomentarController`; `NotifikasiController` tetap dipertahankan
- **View**: Ubah `komentar-publik.blade.php` — hapus form login, hapus tombol like, ganti dengan form nama+komentar; ubah info login di `layouts/publik.blade.php` jika ada
- **Route**: Hapus route Google OAuth, logout pengguna, dan like; ubah route komentar store
- **Database**: Migrasi untuk drop `users`, `likes`; migrasi untuk restruktur `comments` (rename `pengirim` ke `nama`, drop `commenter_*`); tabel `notifikasi` tetap ada
- **Dependensi**: Hapus `x-laravel/commentable` dan `laravel/socialite` dari `composer.json`
- **Config**: Hapus guard `pengguna` dari `config/auth.php`; hapus konfigurasi Google dari `config/services.php`
