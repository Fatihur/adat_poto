## ADDED Requirements

### Requirement: Pengunjung dapat mengirim komentar tanpa login
Sistem HARUS menyediakan form komentar publik yang dapat digunakan tanpa autentikasi. Pengunjung wajib mengisi nama dan isi komentar.

#### Scenario: Mengirim komentar berhasil
- **WHEN** pengunjung mengisi nama dan isi komentar pada halaman detail informasi adat atau kegiatan adat, lalu menekan tombol kirim
- **THEN** komentar tersimpan dengan status "terbit" dan langsung tampil di halaman tersebut

#### Scenario: Mengirim komentar tanpa nama
- **WHEN** pengunjung mengosongkan field nama
- **THEN** sistem menampilkan pesan validasi bahwa nama wajib diisi

#### Scenario: Mengirim komentar tanpa isi
- **WHEN** pengunjung mengosongkan field komentar
- **THEN** sistem menampilkan pesan validasi bahwa komentar wajib diisi

#### Scenario: Komentar melebihi batas karakter
- **WHEN** pengunjung mengisi komentar lebih dari 2000 karakter
- **THEN** sistem menampilkan pesan validasi bahwa komentar maksimal 2000 karakter

### Requirement: Pengunjung dapat membalas komentar
Sistem HARUS mendukung balasan komentar (reply) melalui field `parent_id`. Form balasan menggunakan form komentar yang sama.

#### Scenario: Membalas komentar
- **WHEN** pengunjung menekan tombol "Balas" pada sebuah komentar, mengisi nama dan isi, lalu mengirim
- **THEN** komentar balasan tersimpan dengan `parent_id` mengacu ke komentar induk dan tampil di bawah komentar induk

#### Scenario: Membalas komentar yang tidak ada
- **WHEN** sistem menerima `parent_id` yang tidak valid (tidak ada di database atau bukan milik konten yang sama)
- **THEN** sistem menampilkan pesan error bahwa komentar yang dibalas tidak ditemukan

### Requirement: Admin dapat melihat daftar komentar
Admin HARUS dapat melihat semua komentar dari seluruh konten melalui halaman admin.

#### Scenario: Melihat daftar komentar
- **WHEN** admin membuka halaman kelola komentar
- **THEN** sistem menampilkan tabel berisi pengirim, isi komentar, konten terkait, status, tanggal, dan aksi

#### Scenario: Memfilter komentar berdasarkan status
- **WHEN** admin memilih filter "Terbit" atau "Disembunyikan"
- **THEN** sistem hanya menampilkan komentar dengan status yang dipilih

#### Scenario: Mencari komentar
- **WHEN** admin mengetik kata kunci di field pencarian
- **THEN** sistem menampilkan komentar yang nama pengirim atau isinya mengandung kata kunci

### Requirement: Admin dapat menyembunyikan komentar
Admin HARUS dapat menyembunyikan komentar yang tidak pantas. Komentar tersembunyi tidak menampilkan isinya di halaman publik.

#### Scenario: Menyembunyikan komentar
- **WHEN** admin menekan tombol "Sembunyikan" pada sebuah komentar
- **THEN** status komentar berubah menjadi "disembunyikan" dan isi komentar diganti teks "Komentar disembunyikan oleh admin" di halaman publik

#### Scenario: Menampilkan kembali komentar
- **WHEN** admin menekan tombol "Tampilkan" pada komentar yang disembunyikan
- **THEN** status komentar berubah menjadi "terbit" dan isi komentar kembali tampil di halaman publik

### Requirement: Admin mendapat notifikasi komentar baru di dashboard
Sistem HARUS mencatat notifikasi ke tabel `notifikasi` setiap kali komentar baru dikirim oleh pengunjung. Notifikasi hanya untuk admin, bukan email ke pengguna.

#### Scenario: Notifikasi tercipta saat komentar baru
- **WHEN** pengunjung berhasil mengirim komentar baru
- **THEN** sistem membuat record di tabel `notifikasi` dengan judul "Komentar Baru", pesan berisi nama pengirim dan judul konten, serta URL menuju halaman kelola komentar

#### Scenario: Admin melihat notifikasi
- **WHEN** admin membuka dashboard atau halaman notifikasi
- **THEN** sistem menampilkan daftar notifikasi komentar yang belum/telah dibaca

### Requirement: Komentar ditampilkan di halaman detail konten
Sistem HARUS menampilkan daftar komentar beserta balasannya di halaman detail Informasi Adat dan Kegiatan Adat.

#### Scenario: Melihat daftar komentar
- **WHEN** pengunjung membuka halaman detail informasi adat atau kegiatan adat
- **THEN** sistem menampilkan semua komentar level atas (root) beserta balasannya, diurutkan dari yang terbaru

#### Scenario: Tidak ada komentar
- **WHEN** pengunjung membuka halaman detail yang belum memiliki komentar
- **THEN** sistem menampilkan pesan "Belum ada diskusi. Jadilah yang pertama!"
