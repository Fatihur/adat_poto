# Sistem Informasi Adat Desa Poto — Dokumentasi Fitur & Role Akses

> **Aplikasi:** Sistem Informasi Adat Desa Poto  
> **Domain:** [desapoto.fatihur.com](https://desapoto.fatihur.com)  
> **Tech Stack:** Laravel 13 + MySQL + Tailwind v4 + Alpine.js  
> **Auth:** 2 guard terpisah (`web` untuk Admin, `pengguna` untuk User Publik via Google OAuth)  

---

## 1. Arsitektur Role & Autentikasi

### 1.1. Role (2 Role)

| Role | Guard | Model | Auth Method | Tujuan |
|---|---|---|---|---|
| **Admin** | `web` | `App\Models\Admin` | Login form (email + password) | Mengelola seluruh konten & data |
| **User Publik (Warga)** | `pengguna` | `App\Models\User` | Google OAuth (Socialite) | Berkomentar, like, membaca konten |

### 1.2. Diagram Alur Login

```
                   ┌──────────────────────────────┐
                   │         SISTEMA               │
                   │   Sistem Informasi Adat Desa  │
                   └──────────┬───────────────────┘
                              │
              ┌───────────────┴───────────────┐
              │                               │
              ▼                               ▼
    ┌──────────────────┐          ┌──────────────────────┐
    │   Role: ADMIN    │          │  Role: USER PUBLIK   │
    │   Guard: web     │          │  Guard: pengguna     │
    │                  │          │                      │
    │   Login:         │          │   Login:             │
    │   /admin/login   │          │   Google OAuth       │
    │   (email+pass)   │          │   /auth/google       │
    │                  │          │                      │
    │   Akses penuh    │          │   Membaca konten     │
    │   CRUD semua     │          │   + Komentar         │
    │   konten         │          │   + Like             │
    └──────────────────┘          └──────────────────────┘
```

### 1.3. Morph Map (Polymorphic Relations)

Semua relasi polymorphic menggunakan alias (bukan FQCN) via `Relation::enforceMorphMap()`:

| Alias | Model |
|---|---|
| `admin` | `App\Models\Admin` |
| `user` | `App\Models\User` |
| `informasi_adat` | `App\Models\InformasiAdat` |
| `kegiatan_adat` | `App\Models\KegiatanAdat` |
| `komentar` | `App\Models\Komentar` |
| `like` | `App\Models\Like` |

---

## 2. Fitur — Halaman Publik (Semua Masyarakat)

### 2.1. Beranda
- **Route:** `GET /` → `BerandaController@index`
- **Akses:** Publik (tanpa login)
- **Fitur:**
  - Hero section dengan branding desa
  - Cuplikan informasi adat terbaru (3 item)
  - Cuplikan kegiatan adat terbaru (3 item)
  - Statistik desa (luas wilayah, jumlah dusun, dll.)
  - Navigasi cepat ke semua halaman

### 2.2. Profil Desa
- **Route:** `GET /profil` → `ProfilController@index`
- **Akses:** Publik
- **Fitur:**
  - Menampilkan deskripsi desa (sejarah, geografis, demografis)
  - Foto desa
  - Informasi umum tentang Desa Poto

### 2.3. Informasi Adat
- **Routes:**
  - `GET /informasi-adat` → `InformasiAdatController@index` — Daftar informasi
  - `GET /informasi-adat/{informasiAdat}` → `InformasiAdatController@show` — Detail
- **Akses:** Publik
- **Fitur:**
  - Daftar artikel informasi adat (judul, kategori, gambar, deskripsi singkat)
  - Filter berdasarkan kategori
  - Status hanya menampilkan yang `terbit`
  - Halaman detail dengan komentar + like
  - **Kategori:** Upacara Adat, Perkawinan, Ritual, Budaya, Sejarah, Tokoh Adat, Hukum Adat

### 2.4. Struktur Organisasi
- **Route:** `GET /struktur-organisasi` → `StrukturController@index`
- **Akses:** Publik
- **Fitur:**
  - Menampilkan daftar pengurus adat (nama, jabatan, foto)
  - Daftar pengurus adat desa

### 2.5. Kegiatan Adat
- **Routes:**
  - `GET /kegiatan` → `KegiatanController@index` — Daftar kegiatan
  - `GET /kegiatan/{kegiatanAdat}` → `KegiatanController@show` — Detail
- **Akses:** Publik
- **Fitur:**
  - Daftar kegiatan adat (judul, tanggal, lokasi, status)
  - Filter status: Akan Datang, Sedang Berlangsung, Selesai
  - Halaman detail dengan komentar + like

### 2.6. Galeri
- **Route:** `GET /galeri` → `GaleriController@index`
- **Akses:** Publik
- **Fitur:**
  - Galeri foto kegiatan dan informasi adat
  - Tampilan grid responsive

---

## 3. Fitur Interaktif Publik (Wajib Login Google)

### 3.1. Login Google OAuth
- **Routes:**
  - `GET /auth/google` → Redirect ke Google
  - `GET /auth/google/callback` → Callback dari Google
  - `POST /logout-pengguna` → Logout
- **Akses:** Publik (sebelum login)
- **Fitur:**
  - Login dengan akun Google
  - Auto-create user jika pertama kali login
  - Session via guard `pengguna`
  - Remember me (cookie `remember_pengguna_*`)

### 3.2. Komentar (dengan Nested Replies)
- **Route:** `POST /komentar` → `KomentarController@store`
- **Akses:** Wajib login `pengguna`
- **Fitur:**
  - Komentar pada halaman detail Informasi Adat dan Kegiatan Adat
  - **Reply/balas** bersarang (nested) — tak terbatas kedalaman
  - **Status moderasi:**
    - `draf` — default untuk komentar baru (perlu disetujui admin)
    - `terbit` — sudah disetujui admin, tampil di publik
  - Notifikasi real-time untuk admin (via `Notifikasi` model)
  - Notifikasi email ke pemilik komentar jika ada balasan (via `KomentarDibalas` notification)
  - Tampilkan avatar pengirim (dari Google)

### 3.3. Like Komentar (AJAX)
- **Route:** `POST /like/{komentar}` → `LikeController@toggle` (middleware `auth:pengguna`)
- **Akses:** Wajib login `pengguna`
- **Fitur:**
  - Toggle like/unlike via fetch AJAX
  - Response JSON (`{ liked: bool, total: int }`)
  - Notifikasi email ke pemilik komentar jika mendapat like baru (via `KomentarDisukai` notification)
  - Cegah like diri sendiri (tidak kirim notifikasi ke diri sendiri)

### 3.4. Alur Komentar + Like

```
                         ┌─────────────────────┐
                         │   Halaman Publik     │
                         │ Detail Info/Kegiatan │
                         └──────────┬──────────┘
                                    │
                    ┌───────────────┴───────────────┐
                    │         Cek Login?             │
                    └───────┬───────────────┬───────┘
                       Tidak│               │Ya
                            ▼               ▼
              ┌─────────────────────┐  ┌─────────────────┐
              │ Tombol Login Google │  │ Form Komentar   │
              │ Tampil              │  │ + Like Button   │
              └─────────────────────┘  └────────┬────────┘
                                                 │
                                    ┌────────────┴────────────┐
                                    │  Admin Approve?          │
                                    │  (status: draf → terbit) │
                                    └────────────┬────────────┘
                                                 │
                                    ┌────────────┴────────────┐
                                    │  Tampil di Halaman      │
                                    │  Publik                 │
                                    └─────────────────────────┘
```

---

## 4. Fitur — Panel Admin (Wajib Login Admin)

### 4.1. Dashboard
- **Route:** `GET /admin/dashboard` → `Admin\DashboardController@index`
- **Akses:** `auth` (guard `web`)
- **Fitur:**
  - Statistik cepat (jumlah informasi, kegiatan, galeri, komentar, pengurus)
  - Grafik atau ringkasan aktivitas
  - Tautan cepat ke halaman kelola

### 4.2. Profil Desa
- **Routes:**
  - `GET /admin/profil` → Index
  - `GET /admin/profil/{profil}/edit` → Edit
  - `PUT /admin/profil/{profil}` → Update
- **Akses:** `auth`
- **Fitur:**
  - Edit deskripsi profil desa (WYSIWYG / HTML)
  - Upload/foto profil desa
  - Status: draft/terbit

### 4.3. Informasi Adat (CRUD)
- **Routes:** Resource `admin/informasi` (except `show`)
- **Akses:** `auth`
- **Fitur:**
  - **Create:** tambah informasi adat baru (judul, kategori, deskripsi, gambar, status)
  - **Read:** daftar semua informasi dengan filter dan pencarian
  - **Update:** edit informasi yang sudah ada
  - **Delete:** hapus informasi
  - **Status:** draf / terbit (yang terbit saja tampil di publik)
  - **Upload gambar** — disimpan di `storage/app/public/informasi/`

### 4.4. Struktur Organisasi / Pengurus Adat
- **Routes:** Resource `admin/pengurus` (except `show`)
- **Akses:** `auth`
- **Fitur:**
  - **Create:** tambah pengurus baru (nama, jabatan, foto)
  - **Read:** daftar semua pengurus
  - **Update:** edit data pengurus
  - **Delete:** hapus pengurus
  - **Upload foto** — disimpan di `storage/app/public/pengurus/`

### 4.5. Kegiatan Adat (CRUD)
- **Routes:** Resource `admin/kegiatan` (except `show`)
- **Akses:** `auth`
- **Fitur:**
  - **Create:** tambah kegiatan baru (judul, tanggal, lokasi, deskripsi, gambar, status)
  - **Read:** daftar semua kegiatan
  - **Update:** edit kegiatan
  - **Delete:** hapus kegiatan
  - **Status:** Akan Datang / Sedang Berlangsung / Selesai
  - **Upload gambar** — disimpan di `storage/app/public/kegiatan/`

### 4.6. Galeri (CRUD)
- **Routes:** Resource `admin/galeri` (except `show`)
- **Akses:** `auth`
- **Fitur:**
  - **Create:** upload foto galeri (judul, gambar)
  - **Read:** daftar semua foto galeri
  - **Update:** edit judul/ganti gambar
  - **Delete:** hapus foto
  - **Upload gambar** — disimpan di `storage/app/public/galeri/`

### 4.7. Kelola Komentar
- **Routes:**
  - `GET /admin/komentar` → Daftar komentar
  - `PATCH /admin/komentar/{komentar}/setujui` → Setujui (draf → terbit)
  - `PATCH /admin/komentar/{komentar}/tolak` → Arsipkan (terbit → draf)
  - `DELETE /admin/komentar/{komentar}` → Hapus
- **Akses:** `auth`
- **Fitur:**
  - Daftar semua komentar (dengan info pengirim, konten, waktu, status)
  - **Filter:** berdasarkan status (terbit/draf), pencarian teks
  - **Moderasi:** setujui komentar baru, arsipkan komentar, hapus komentar
  - Tampilkan avatar pengirim (dari Google)
  - Tandai komentar yang merupakan balasan (↪)
  - Link ke konten tempat komentar berada

### 4.8. Notifikasi
- **Routes:**
  - `GET /admin/notifikasi` → Daftar notifikasi
  - `GET /admin/notifikasi/{notifikasi}/baca` → Tandai dibaca
  - `PATCH /admin/notifikasi/baca-semua` → Tandai semua dibaca
  - `DELETE /admin/notifikasi/{notifikasi}` → Hapus
- **Akses:** `auth`
- **Fitur:**
  - Notifikasi otomatis saat ada komentar baru dari publik
  - Badge jumlah notifikasi belum dibaca di sidebar
  - Tandai dibaca (individu atau massal)
  - Hapus notifikasi
  - Link ke halaman kelola komentar

### 4.9. Struktur Halaman Admin

```
┌─────────────────────────────────────────────────────────────┐
│  ┌─────────────────────────────────────────────────────────┐│
│  │  Header: Dashboard — Admin Sistem Informasi Adat       ││
│  └─────────────────────────────────────────────────────────┘│
│  ┌────────────┬────────────────────────────────────────────┐│
│  │ SIDEBAR    │  KONTEN UTAMA                             ││
│  │            │                                            ││
│  │ ● Dashboard│  • Statistik                               ││
│  │ ● Profil   │  • Tabel data                              ││
│  │ ● Informasi│  • Form input                              ││
│  │ ● Struktur │  • Detail item                             ││
│  │ ● Kegiatan │                                            ││
│  │ ● Galeri   │                                            ││
│  │ ● Komentar │                                            ││
│  │ ● Notifikasi│                                           ││
│  │            │                                            ││
│  │ [Logout]   │                                            ││
│  └────────────┴────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────────┘
```

---

## 5. Matriks Akses Per-Fitur

### 5.1. Halaman Publik

| Fitur | Masyarakat (unauthenticated) | User Publik (Google Auth) | Admin |
|---|---|---|---|
| Beranda | ✅ Baca | ✅ Baca | ✅ Baca |
| Profil Desa | ✅ Baca | ✅ Baca | ✅ Baca |
| Informasi Adat (index) | ✅ Baca | ✅ Baca | ✅ Baca |
| Informasi Adat (detail) | ✅ Baca | ✅ Baca + Komentar + Like | ✅ Baca |
| Struktur Organisasi | ✅ Baca | ✅ Baca | ✅ Baca |
| Kegiatan Adat (index) | ✅ Baca | ✅ Baca | ✅ Baca |
| Kegiatan Adat (detail) | ✅ Baca | ✅ Baca + Komentar + Like | ✅ Baca |
| Galeri | ✅ Baca | ✅ Baca | ✅ Baca |
| Komentar (kirim) | ❌ (login) | ✅ | ❌ (via form publik) |
| Like | ❌ (login) | ✅ | ❌ (tidak perlu) |
| Login Google | ✅ | — | — |
| Logout Publik | — | ✅ | — |

### 5.2. Panel Admin

| Fitur | Admin |
|---|---|
| Dashboard (statistik) | ✅ |
| Profil Desa — Edit | ✅ |
| Profil Desa — Update | ✅ |
| Informasi Adat — Lihat daftar | ✅ |
| Informasi Adat — Tambah | ✅ |
| Informasi Adat — Edit | ✅ |
| Informasi Adat — Hapus | ✅ |
| Pengurus — Lihat daftar | ✅ |
| Pengurus — Tambah | ✅ |
| Pengurus — Edit | ✅ |
| Pengurus — Hapus | ✅ |
| Kegiatan — Lihat daftar | ✅ |
| Kegiatan — Tambah | ✅ |
| Kegiatan — Edit | ✅ |
| Kegiatan — Hapus | ✅ |
| Galeri — Lihat daftar | ✅ |
| Galeri — Tambah | ✅ |
| Galeri — Edit | ✅ |
| Galeri — Hapus | ✅ |
| Komentar — Lihat daftar | ✅ |
| Komentar — Setujui | ✅ |
| Komentar — Arsipkan | ✅ |
| Komentar — Hapus | ✅ |
| Notifikasi — Lihat | ✅ |
| Notifikasi — Tandai dibaca | ✅ |
| Notifikasi — Hapus | ✅ |

---

## 6. Entity Relationship Diagram (Simplified)

```
┌────────────────┐       ┌─────────────────┐       ┌─────────────────┐
│    Admin       │       │    User          │       │  Notifikasi     │
│────────────────│       │─────────────────│       │─────────────────│
│ id (PK)        │       │ id (PK)          │       │ id (PK)         │
│ nama           │       │ google_id (uniq) │       │ judul           │
│ email (uniq)   │       │ name             │       │ pesan           │
│ kata_sandi     │       │ email            │       │ url             │
│ remember_token │       │ avatar           │       │ is_read (bool)  │
└────────────────┘       │ email_notifikasi │       │ created_at      │
                          │ created_at       │       └─────────────────┘
                          │ updated_at       │
                          └────────┬────────┘
                                   │ 1
                                   │
                          ┌────────┴────────┐
                          │   Like          │
                          │─────────────────│
                          │ id (PK)         │
                          │ user_id (FK)    │──────┐
                          │ likeable_id      │      │ N
                          │ likeable_type    │      │
                          │ created_at       │      │
                          │ updated_at       │      │
                          └─────────────────┘      │
                                                   │
                          ┌─────────────────┐      │
                          │   Komentar      │      │
                          │─────────────────│      │
                          │ id (PK)         │      │
                          │ body            │      │
                          │ parent_id (FK)──┼──┐  │ (self-ref)
                          │ pengirim        │  │  │
                          │ status          │  │  │
                          │ commenter_id(FK)│──┼──┘ (→ User)
                          │ commenter_type  │  │
                          │ commentable_id  │  │
                          │ commentable_type│  │
                          │ created_at      │  │
                          │ updated_at      │  │
                          └─────────────────┘  │
                               │               │
                    ┌──────────┴──────────┐    │
                    │ (commentable)       │    │
               ┌────┴─────┐       ┌──────┴─────┐
               │ Informasi│       │  Kegiatan  │
               │ Adat     │       │  Adat      │
               └──────────┘       └────────────┘
```

---

## 7. Notifikasi Email

### 7.1. Event Pemicu

| Event | Notification Class | Penerima | Trigger |
|---|---|---|---|
| Komentar dibalas | `KomentarDibalas` | Pemilik komentar asli (via email) | `Komentar::created` event (jika `parent_id` ada) |
| Komentar di-like | `KomentarDisukai` | Pemilik komentar (via email) | `LikeController@toggle` (jika like baru) |

### 7.2. Syarat Terkirim

- User harus memiliki alamat email valid (dari Google)
- `email_notifikasi` = `true` (default)
- Bukan notifikasi ke diri sendiri
- SMTP harus dikonfigurasi di `.env` (`MAIL_*`)

---

## 8. Catatan Teknis

### Session & Cache

| Komponen | Driver | Lokasi |
|---|---|---|
| Session | `file` | `storage/framework/sessions/` |
| Cache | `file` | `storage/framework/cache/data/` |

### File Storage

| Tipe File | Path di Storage |
|---|---|
| Gambar Profil Desa | `storage/app/public/profil/` |
| Gambar Informasi | `storage/app/public/informasi/` |
| Gambar Kegiatan | `storage/app/public/kegiatan/` |
| Gambar Galeri | `storage/app/public/galeri/` |
| Foto Pengurus | `storage/app/public/pengurus/` |

(Public link via `php artisan storage:link` → `public/storage/`)

### Middleware Stack

| Middleware | Route Group | Fungsi |
|---|---|---|
| `auth` | `admin.*` | Wajib login Admin (guard `web`) |
| `auth:pengguna` | `/like/*` | Wajib login User Publik (guard `pengguna`) |
| Manual check | `/komentar` (POST) | `Auth::guard('pengguna')->user()` |
| `redirectGuestsTo` | Global | Redirect ke `admin.login` (non-AJAX) |
| `shouldRenderJsonWhen` | Global | JSON response untuk `/api/*` atau `expectsJson()` |
