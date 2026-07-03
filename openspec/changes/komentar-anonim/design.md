## Context

Saat ini sistem komentar menggunakan package `x-laravel/commentable` yang menyediakan relasi polymorphic `commentable` + `commenter`, soft delete, dan threading. Komentar terikat ke user yang login via Google OAuth (`laravel/socialite`). Fitur likes juga ada dengan tabel `likes` polymorphic. Notifikasi email dikirim saat komentar dibalas atau disukai. Admin mendapat notifikasi dashboard (`notifikasi` table) saat komentar baru masuk.

Target: sistem komentar anonim sederhana — pengunjung isi nama + komentar, admin moderasi. Tanpa login, tanpa likes, tanpa email, tanpa plugin eksternal.

## Goals / Non-Goals

**Goals:**
- Komentar native Laravel tanpa package pihak ketiga
- Pengunjung berkomentar dengan mengisi nama (wajib) dan isi komentar
- Balasan komentar (reply) tetap berfungsi via `parent_id`
- Admin dapat menyembunyikan/menampilkan komentar (moderasi)
- Hapus seluruh infrastruktur: users, likes, OAuth, email notifikasi

**Non-Goals:**
- Tidak menambah fitur baru selain yang sudah ada
- Tidak mengubah struktur tabel `informasi_adat` atau `kegiatan_adat`
- Tidak mengubah admin panel di luar menu komentar
- Tidak mengubah layout publik secara signifikan (hanya form komentar)
- Tidak mengubah autentikasi admin (tetap pakai tabel `admin` dan session guard)

## Decisions

### 1. Model Komentar: native vs extend vendor

**Keputusan**: Buat model `Komentar` native yang extends `Illuminate\Database\Eloquent\Model` langsung, tidak lagi extends `XLaravel\Commentable\Comment`.

**Alasan**: Tidak ada lagi ketergantungan pada vendor. Relasi polymorphic `commentable` tetap digunakan — pattern bawaan Laravel.

**Alternatif**: extend vendor tapi override — akan membawa beban dependensi yang tidak diperlukan.

### 2. Relasi komentar ke konten: polymorphic vs separate tables

**Keputusan**: Tetap polymorphic (`commentable_type` + `commentable_id`).

**Alasan**: Satu tabel `comments` melayani `InformasiAdat` dan `KegiatanAdat`. Pattern ini sudah standar dan berfungsi baik. Tidak ada keuntungan memecah ke dua tabel terpisah.

### 3. Migrasi: in-place alter vs drop & recreate

**Keputusan**: Satu migration baru yang:
1. Drop tabel `likes`, `users`
2. Alter tabel `comments`: rename `pengirim` ke `nama`, drop `commenter_type` dan `commenter_id`, ubah `nama` jadi NOT NULL

**Alasan**: Data komentar existing tetap dipertahankan (body, status, parent_id, commentable relations). Hanya kolom identitas pengirim yang diubah. `pengirim` yang existing (walaupun sebagian besar NULL karena tidak dipakai) akan jadi `nama`. Tabel `notifikasi` tidak disentuh — tetap berfungsi untuk dashboard admin.

**Risiko**: Jika ada data di `users` atau `likes`, data tersebut hilang. Saat ini aplikasi masih development — risiko dapat diterima.

### 4. Form komentar: nama wajib + body

**Keputusan**: Form publik hanya butuh dua field: `nama` (text input, required) dan `body` (textarea, required). Tidak ada login, tidak ada avatar.

**Alasan**: Sesuai PRD section 14.8 yang mendesain `nama_pengirim` + `isi_komentar`. Menghilangkan friksi login Google.

### 5. Notifikasi: tabel notifikasi tetap, email dihapus

**Keputusan**: Tabel `notifikasi` tetap dipertahankan untuk notifikasi dashboard admin saat komentar baru masuk. Hapus semua notifikasi email (`KomentarDibalas`, `KomentarDisukai`).

**Alasan**: Notifikasi dashboard sederhana membantu admin mengetahui komentar baru tanpa harus selalu cek halaman komentar. Email notification tidak diperlukan — tidak ada lagi data email pengguna.

### 6. Validasi input

**Keputusan**: Nama maksimal 100 karakter, body maksimal 2000 karakter (sama seperti sebelumnya). Validasi server-side via Laravel Validator.

## Risks / Trade-offs

| Risk | Mitigation |
|------|------------|
| Spam komentar tanpa autentikasi | Admin bisa menyembunyikan komentar. Bisa ditambahkan rate limiting atau CAPTCHA di masa depan jika diperlukan |
| Tidak ada identitas user tetap — tidak bisa blokir user spesifik | Diterima sebagai trade-off kesederhanaan. Untuk website desa kecil, moderasi manual cukup |
| Data `users` dan `likes` hilang (jika ada data production) | Aplikasi masih development, tidak ada data production |
| Nama bisa dipalsukan (impersonasi) | Tidak ada data sensitif. Komentar hanya teks pada konten adat. Risiko rendah |

## Open Questions

- Apakah perlu rate limiting sederhana (misal: 5 komentar per IP per menit)? Bisa ditambahkan sebagai enhancement terpisah.
