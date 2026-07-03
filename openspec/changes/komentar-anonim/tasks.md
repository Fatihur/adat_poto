## 1. Database — Hapus dan restruktur tabel

- [x] 1.1 Buat migration baru untuk drop tabel `likes`, `users`
- [x] 1.2 Buat migration baru untuk alter tabel `comments`: rename `pengirim` ke `nama` (NOT NULL, default ''), drop kolom `commenter_type` dan `commenter_id`
- [x] 1.3 Migration file dibuat — jalankan `php artisan migrate` saat database tersedia

## 2. Dependensi — Hapus package eksternal

- [x] 2.1 Hapus `x-laravel/commentable` dari `composer.json`
- [x] 2.2 Hapus `laravel/socialite` dari `composer.json`
- [x] 2.3 Jalankan `composer update` untuk menghapus package dari vendor
- [x] 2.4 Hapus konfigurasi `google` dari `config/services.php`

## 3. Model — Hapus model lama

- [x] 3.1 Hapus file `app/Models/User.php`
- [x] 3.2 Hapus file `app/Models/Like.php`
- [x] 3.3 Hapus file `app/Models/Traits/HasLikes.php`
- [x] 3.4 Hapus file `app/Models/Komentar.php` (akan dibuat ulang)

## 4. Model — Buat model Komentar native

- [x] 4.1 Buat `app/Models/Komentar.php` extends `Model` (bukan vendor), dengan `SoftDeletes`, tabel `comments`, fillable `['nama', 'body', 'status', 'parent_id', 'commentable_id', 'commentable_type']`
- [x] 4.2 Tambahkan relasi `commentable()` MorphTo, `parent()` BelongsTo ke self, `replies()` HasMany ke self
- [x] 4.3 Tambahkan scope `terbit()`, `disembunyikan()` dan method `labelStatus()`
- [x] 4.4 Tambahkan accessor `nama_pengirim` (return `$this->nama`)

## 5. Model — Tambah relasi ke konten

- [x] 5.1 Hapus `use XLaravel\Commentable\Commentable` dari `InformasiAdat.php`, ganti dengan relasi native `comments()` MorphMany dan `rootComments()`
- [x] 5.2 Hapus `use XLaravel\Commentable\Commentable` dari `KegiatanAdat.php`, ganti dengan relasi native `comments()` MorphMany dan `rootComments()`
- [x] 5.3 Hapus `use XLaravel\Commentable\Commenter` dari `User.php` (file sudah dihapus di 3.1, tapi pastikan tidak ada reference)

## 6. Controller — Hapus controller lama

- [x] 6.1 Hapus `app/Http/Controllers/KomentarController.php` (publik)
- [x] 6.2 Hapus `app/Http/Controllers/Admin/KomentarController.php` (admin)
- [x] 6.3 Hapus `app/Http/Controllers/LikeController.php`
- [x] 6.4 Hapus `app/Http/Controllers/Auth/GoogleLoginController.php`
- [x] 6.5 Hapus `app/Notifications/KomentarDibalas.php`
- [x] 6.6 Hapus `app/Notifications/KomentarDisukai.php`

## 7. Controller — Buat controller Komentar publik baru

- [x] 7.1 Buat `app/Http/Controllers/KomentarController.php` dengan method `store(Request)` — validasi `type`, `id`, `nama` (required|max:100), `body` (required|max:2000), `parent_id` (nullable)
- [x] 7.2 Resolve model berdasarkan `type` (informasi/kegiatan), validasi `parent_id` milik konten yang sama
- [x] 7.3 Simpan komentar langsung via `Komentar::create()`, lalu buat record `Notifikasi` untuk admin dashboard
- [x] 7.4 Redirect back dengan pesan sukses/error

## 8. Controller — Buat controller Admin Komentar baru

- [x] 8.1 Buat `app/Http/Controllers/Admin/KomentarController.php` dengan method `index(Request)` — filter status, pencarian nama+body, paginate, with `commentable`
- [x] 8.2 Tambahkan method `tampilkan(Komentar)` — update status ke `terbit`
- [x] 8.3 Tambahkan method `sembunyikan(Komentar)` — update status ke `disembunyikan`

## 9. Routes — Update routing

- [x] 9.1 Hapus route Google OAuth (`auth/google`, `auth/google/callback`, `logout-pengguna`) dari `routes/web.php`
- [x] 9.2 Hapus route like (`POST /like/{komentar}`) dari `routes/web.php`
- [x] 9.3 Pastikan route `POST /komentar` dan admin routes komentar tetap ada
- [x] 9.4 Hapus middleware `auth:pengguna` dari route like (sudah tidak relevan)

## 10. View — Update komentar publik

- [x] 10.1 Ubah `komentar-publik.blade.php`: hapus bagian login prompt, ganti dengan form nama + komentar (tanpa avatar, tanpa Google login)
- [x] 10.2 Hapus bagian avatar pengirim (ganti dengan inisial nama)
- [x] 10.3 Hapus tombol like dan JavaScript `likeKomentar()`
- [x] 10.4 Pertahankan tombol "Balas" dan JavaScript `balas()` / `batalBalas()`

## 11. View — Update admin komentar

- [x] 11.1 Update `admin/komentar/index.blade.php`: pastikan kompatibel dengan model Komentar baru (pakai `nama_pengirim` accessor)
- [x] 11.2 Hapus referensi ke avatar (atau ganti inisial nama)

## 12. Auth Config — Bersihkan guard pengguna

- [x] 12.1 Hapus guard `pengguna` dari `config/auth.php` (providers dan guards section)
- [x] 12.2 Pastikan guard `web` (admin) tetap berfungsi

## 13. View Layout — Bersihkan referensi login publik

- [x] 13.1 Cek `layouts/publik.blade.php` — tidak ada tombol login Google, bersih
- [x] 13.2 Cek `layouts/admin.blade.php` — menu notifikasi tetap berfungsi

## 14. Verifikasi — Pastikan tidak ada broken reference

- [x] 14.1 `grep` seluruh codebase untuk `XLaravel\Commentable` — bersih
- [x] 14.2 `grep` seluruh codebase untuk `App\Models\User` — bersih (AppServiceProvider sudah dibersihkan)
- [x] 14.3 `grep` seluruh codebase untuk `App\Models\Like` — bersih (AppServiceProvider sudah dibersihkan)
- [x] 14.4 `grep` seluruh codebase untuk `HasLikes` — bersih
- [x] 14.5 `grep` seluruh codebase untuk `socialite` — bersih (app/ saja, vendor tidak dicek)
- [x] 14.6 `grep` seluruh codebase untuk `route('google.login')` atau `route('pengguna.logout')` — bersih
- [x] 14.7 `grep` seluruh codebase untuk `route('komentar.like')` — bersih
- [x] 14.8 `grep` seluruh codebase untuk `auth:pengguna` atau `guard('pengguna')` — bersih
- [x] 14.9 `php artisan optimize:clear` berhasil, route:list valid
