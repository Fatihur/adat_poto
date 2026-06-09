# PRODUCT REQUIREMENT DOCUMENT

## Sistem Informasi Adat Desa Poto Berbasis Web

### 1. Ringkasan Produk

Sistem Informasi Adat Desa Poto Berbasis Web adalah aplikasi yang dirancang untuk membantu Pemerintah Desa Poto dalam mengelola, menyimpan, mendokumentasikan, dan menyebarkan informasi adat secara digital. Sistem ini dikembangkan sebagai solusi atas permasalahan pengelolaan informasi adat yang masih dilakukan secara manual dan penyebaran informasi yang masih bergantung pada penyampaian lisan.

Aplikasi ini menyediakan informasi mengenai profil desa, informasi adat, struktur organisasi adat, kegiatan adat, galeri dokumentasi, serta fitur pengelolaan data oleh admin. Sistem dapat diakses oleh masyarakat umum tanpa login, sedangkan admin memiliki akses khusus untuk mengelola seluruh data yang ditampilkan di dalam sistem.

Pengembangan sistem menggunakan metode Rapid Application Development (RAD), yaitu metode pengembangan perangkat lunak yang menekankan proses pembangunan sistem secara cepat, bertahap, dan melibatkan pengguna dalam proses validasi kebutuhan serta perbaikan sistem.

---

### 2. Latar Belakang

Desa Poto merupakan salah satu desa di Kecamatan Moyo Hilir, Kabupaten Sumbawa, yang memiliki kekayaan adat dan budaya lokal. Berbagai kegiatan adat seperti ponan, perkawinan, kesenian tradisional, serta dokumentasi budaya masih menjadi bagian penting dalam kehidupan masyarakat.

Namun, pengelolaan dan penyebaran informasi adat di Desa Poto masih dilakukan secara sederhana. Informasi adat umumnya disampaikan secara lisan, melalui pengeras suara masjid, atau dari perorangan. Selain itu, pencatatan data adat, struktur organisasi adat, dan dokumentasi kegiatan masih dilakukan secara manual oleh pihak pengurus adat atau tetua adat.

Kondisi tersebut menimbulkan beberapa kendala, seperti sulitnya mencari dokumen adat, kurang terorganisirnya dokumentasi kegiatan, terbatasnya akses masyarakat terhadap informasi adat, serta risiko hilangnya data budaya jika tidak terdokumentasi dengan baik. Oleh karena itu, dibutuhkan sistem informasi berbasis web yang mampu menjadi media digital untuk pengelolaan dan penyebaran informasi adat secara lebih efektif, efisien, dan mudah diakses.

---

### 3. Tujuan Produk

Tujuan utama sistem ini adalah merancang dan membangun aplikasi adat Desa Poto berbasis web yang dapat membantu pengelolaan informasi adat secara terstruktur dan memudahkan masyarakat dalam mengakses informasi adat.

Secara khusus, sistem ini bertujuan untuk:

1. Menyediakan media digital untuk menyimpan dan mengelola informasi adat Desa Poto.
2. Mempermudah masyarakat dalam memperoleh informasi adat tanpa harus bergantung pada penyampaian lisan.
3. Membantu pemerintah desa atau pengelola sistem dalam mengelola data profil desa, informasi adat, struktur organisasi adat, kegiatan adat, dan galeri.
4. Mendukung pelestarian budaya lokal melalui dokumentasi digital yang terorganisir.
5. Memperkenalkan Desa Poto sebagai desa adat kepada masyarakat yang lebih luas.
6. Mengurangi risiko hilangnya data dan dokumentasi adat yang sebelumnya masih dikelola secara manual.

---

### 4. Ruang Lingkup Sistem

#### 4.1 Ruang Lingkup Utama

Sistem yang dibangun berbasis web dan berfokus pada pengelolaan informasi adat Desa Poto. Ruang lingkup utama sistem meliputi:

1. Pengelolaan profil desa.
2. Pengelolaan informasi adat.
3. Pengelolaan struktur organisasi adat.
4. Pengelolaan kegiatan adat.
5. Pengelolaan galeri dokumentasi adat.
6. Login admin.
7. Tampilan informasi untuk masyarakat umum.

#### 4.2 Ruang Lingkup Pendukung

Beberapa fitur pendukung yang dapat ditambahkan apabila diperlukan adalah:

1. Notifikasi kegiatan adat.
2. Forum diskusi dan komentar masyarakat.
3. Pencarian informasi adat.
4. Kategori informasi adat.
5. Dashboard ringkasan data untuk admin.

#### 4.3 Di Luar Ruang Lingkup

Sistem ini tidak mencakup:

1. Layanan administrasi desa secara umum.
2. Pengurusan surat menyurat desa.
3. Sistem pembayaran atau transaksi keuangan.
4. Pendataan seluruh penduduk desa.
5. Aplikasi mobile native Android atau iOS.
6. Integrasi dengan sistem pemerintahan daerah lain.

---

### 5. Target Pengguna

#### 5.1 Admin

Admin adalah perangkat desa atau pengelola sistem yang memiliki hak akses untuk masuk ke halaman admin dan mengelola seluruh data yang ada di dalam sistem.

Kebutuhan admin meliputi:

1. Login ke dalam sistem.
2. Mengelola profil desa.
3. Mengelola informasi adat.
4. Mengelola struktur organisasi adat.
5. Mengelola kegiatan adat.
6. Mengelola galeri dokumentasi adat.
7. Menambah, mengubah, dan menghapus data.
8. Mengelola notifikasi kegiatan adat.
9. Mengelola forum diskusi dan komentar, apabila fitur ini digunakan.

#### 5.2 Masyarakat

Masyarakat adalah pengguna umum yang dapat mengakses informasi adat melalui website tanpa perlu login.

Kebutuhan masyarakat meliputi:

1. Melihat profil Desa Poto.
2. Melihat informasi adat.
3. Melihat struktur organisasi adat.
4. Melihat informasi kegiatan adat.
5. Melihat galeri dokumentasi adat.
6. Melihat notifikasi kegiatan adat.
7. Melihat forum diskusi dan komentar, apabila fitur ini digunakan.
8. Mengakses sistem secara mudah melalui browser.

---

### 6. Permasalahan Pengguna

| Pengguna               | Permasalahan                                                  |
| ---------------------- | ------------------------------------------------------------- |
| Admin / Perangkat Desa | Data adat masih dikelola secara manual.                       |
| Admin / Perangkat Desa | Dokumentasi kegiatan adat belum tersimpan secara terstruktur. |
| Admin / Perangkat Desa | Sulit mencari kembali dokumen atau informasi adat tertentu.   |
| Admin / Perangkat Desa | Penyebaran informasi adat belum merata kepada masyarakat.     |
| Masyarakat             | Informasi adat masih bergantung pada penyampaian lisan.       |
| Masyarakat             | Sulit mengetahui jadwal atau dokumentasi kegiatan adat.       |
| Masyarakat             | Tidak semua masyarakat mengetahui struktur pengurus adat.     |
| Masyarakat             | Informasi budaya Desa Poto belum mudah diakses secara luas.   |

---

### 7. Solusi yang Ditawarkan

Sistem Informasi Adat Desa Poto Berbasis Web menjadi media digital yang menyediakan informasi adat secara terpusat. Melalui sistem ini, admin dapat mengelola seluruh informasi adat melalui halaman dashboard, sedangkan masyarakat dapat mengakses informasi tersebut melalui halaman website publik.

Solusi utama yang ditawarkan adalah:

1. Digitalisasi data adat.
2. Penyimpanan dokumentasi adat secara terstruktur.
3. Penyediaan informasi adat yang mudah diakses.
4. Pengelolaan kegiatan adat secara lebih rapi.
5. Penyajian galeri dokumentasi budaya.
6. Penguatan pelestarian budaya lokal melalui media digital.

---

### 8. Fitur Sistem

## 8.1 Fitur Halaman Publik

### 8.1.1 Beranda

Beranda adalah halaman utama yang pertama kali dilihat oleh masyarakat saat mengakses website. Halaman ini berfungsi sebagai pintu masuk menuju informasi utama mengenai Desa Poto dan adat istiadatnya.

Kebutuhan fitur:

1. Menampilkan nama website.
2. Menampilkan deskripsi singkat tentang Desa Poto.
3. Menampilkan gambar atau banner budaya Desa Poto.
4. Menampilkan navigasi ke halaman profil desa, informasi adat, kegiatan adat, struktur organisasi, dan galeri.
5. Menampilkan informasi kegiatan terbaru.
6. Menampilkan cuplikan galeri terbaru.

Acceptance criteria:

1. Masyarakat dapat membuka halaman beranda tanpa login.
2. Halaman beranda menampilkan informasi utama secara jelas.
3. Menu navigasi dapat digunakan untuk berpindah ke halaman lain.
4. Tampilan beranda responsif pada desktop dan perangkat mobile.

---

### 8.1.2 Profil Desa

Fitur profil desa digunakan untuk menampilkan informasi umum mengenai Desa Poto.

Kebutuhan fitur:

1. Menampilkan sejarah singkat Desa Poto.
2. Menampilkan lokasi atau wilayah Desa Poto.
3. Menampilkan informasi umum desa.
4. Menampilkan potensi budaya desa.
5. Menampilkan visi dan misi, apabila tersedia.
6. Menampilkan gambar pendukung desa.

Acceptance criteria:

1. Masyarakat dapat melihat profil desa tanpa login.
2. Data profil desa yang tampil sesuai dengan data yang dimasukkan oleh admin.
3. Informasi profil desa tersusun rapi dan mudah dibaca.
4. Jika admin memperbarui data profil desa, perubahan langsung tampil di halaman publik.

---

### 8.1.3 Informasi Adat

Fitur informasi adat digunakan untuk menampilkan berbagai informasi mengenai adat dan budaya Desa Poto, seperti adat ponan, perkawinan, tradisi lisan, kesenian, dan adat lainnya.

Kebutuhan fitur:

1. Menampilkan daftar informasi adat.
2. Menampilkan detail informasi adat.
3. Menampilkan kategori adat, apabila diperlukan.
4. Menampilkan gambar pendukung pada setiap informasi adat.
5. Menampilkan deskripsi adat secara lengkap.
6. Menampilkan tanggal publikasi atau pembaruan informasi.

Acceptance criteria:

1. Masyarakat dapat melihat daftar informasi adat.
2. Masyarakat dapat membuka detail informasi adat.
3. Informasi adat yang tampil sesuai dengan data yang dikelola admin.
4. Setiap informasi adat dapat memuat judul, deskripsi, gambar, dan kategori.
5. Halaman informasi adat mudah dibaca dan tidak memerlukan login.

---

### 8.1.4 Struktur Organisasi Adat

Fitur struktur organisasi adat digunakan untuk menampilkan data pengurus adat Desa Poto.

Kebutuhan fitur:

1. Menampilkan daftar pengurus adat.
2. Menampilkan nama pengurus adat.
3. Menampilkan jabatan atau peran dalam struktur adat.
4. Menampilkan foto pengurus, apabila tersedia.
5. Menampilkan keterangan tambahan, apabila diperlukan.

Acceptance criteria:

1. Masyarakat dapat melihat struktur organisasi adat.
2. Data struktur organisasi yang tampil sesuai dengan data yang dikelola admin.
3. Informasi pengurus adat ditampilkan secara rapi.
4. Jika data struktur organisasi diperbarui oleh admin, perubahan tampil pada halaman publik.

---

### 8.1.5 Kegiatan Adat

Fitur kegiatan adat digunakan untuk menampilkan informasi mengenai jadwal dan deskripsi kegiatan adat di Desa Poto.

Kebutuhan fitur:

1. Menampilkan daftar kegiatan adat.
2. Menampilkan detail kegiatan adat.
3. Menampilkan tanggal kegiatan.
4. Menampilkan lokasi kegiatan.
5. Menampilkan deskripsi kegiatan.
6. Menampilkan gambar kegiatan, apabila tersedia.
7. Menampilkan status kegiatan, seperti akan datang, sedang berlangsung, atau selesai.

Acceptance criteria:

1. Masyarakat dapat melihat daftar kegiatan adat.
2. Masyarakat dapat membuka detail kegiatan adat.
3. Setiap kegiatan menampilkan informasi tanggal, lokasi, dan deskripsi.
4. Kegiatan terbaru dapat ditampilkan di halaman beranda.
5. Data kegiatan yang tampil sesuai dengan data yang dikelola admin.

---

### 8.1.6 Galeri Dokumentasi Adat

Fitur galeri digunakan untuk menampilkan dokumentasi foto kegiatan adat dan budaya Desa Poto.

Kebutuhan fitur:

1. Menampilkan daftar foto dokumentasi.
2. Menampilkan judul dokumentasi.
3. Menampilkan deskripsi singkat dokumentasi.
4. Menampilkan tanggal dokumentasi.
5. Menampilkan foto dalam tampilan galeri.
6. Menampilkan detail foto, apabila dibuka oleh pengguna.

Acceptance criteria:

1. Masyarakat dapat melihat galeri dokumentasi tanpa login.
2. Foto dapat tampil dengan baik pada halaman galeri.
3. Data galeri sesuai dengan data yang diunggah oleh admin.
4. Foto tersusun rapi dan mudah diakses.
5. Sistem menampilkan pesan apabila belum ada dokumentasi yang tersedia.

---

### 8.1.7 Notifikasi Kegiatan Adat

Fitur ini bersifat pendukung dan dapat digunakan untuk menampilkan informasi atau pemberitahuan mengenai kegiatan adat yang akan datang.

Kebutuhan fitur:

1. Menampilkan notifikasi kegiatan terbaru.
2. Menampilkan informasi singkat mengenai kegiatan adat.
3. Mengarahkan pengguna ke detail kegiatan.
4. Menampilkan status kegiatan penting.

Acceptance criteria:

1. Masyarakat dapat melihat notifikasi kegiatan adat.
2. Notifikasi yang tampil berasal dari data yang dikelola admin.
3. Notifikasi dapat membantu masyarakat mengetahui kegiatan adat yang akan datang.
4. Jika tidak ada notifikasi, sistem menampilkan pesan kosong secara informatif.

---

### 8.1.8 Forum Diskusi dan Komentar

Fitur forum diskusi dan komentar bersifat pendukung. Fitur ini dapat digunakan sebagai ruang interaksi masyarakat terkait informasi adat.

Kebutuhan fitur:

1. Masyarakat dapat melihat forum diskusi.
2. Masyarakat dapat melihat komentar.
3. Admin dapat mengelola komentar.
4. Komentar yang tidak sesuai dapat dihapus oleh admin.
5. Forum dapat dikaitkan dengan informasi adat atau kegiatan adat.

Acceptance criteria:

1. Forum dapat ditampilkan pada halaman publik.
2. Komentar yang masuk dapat dilihat oleh admin.
3. Admin dapat menghapus komentar yang tidak relevan.
4. Sistem menjaga agar komentar tidak langsung merusak tampilan website.
5. Fitur forum dapat dinonaktifkan apabila tidak digunakan dalam penelitian.

---

## 8.2 Fitur Halaman Admin

### 8.2.1 Login Admin

Fitur login digunakan agar hanya admin yang dapat mengakses halaman pengelolaan sistem.

Kebutuhan fitur:

1. Admin dapat memasukkan username/email dan password.
2. Sistem memvalidasi data login.
3. Admin yang berhasil login diarahkan ke dashboard.
4. Admin yang gagal login mendapatkan pesan kesalahan.
5. Sistem menyediakan fitur logout.

Acceptance criteria:

1. Admin tidak dapat mengakses dashboard tanpa login.
2. Login berhasil jika username/email dan password sesuai.
3. Login gagal jika data tidak sesuai.
4. Setelah logout, admin harus login kembali untuk mengakses dashboard.
5. Password disimpan secara aman menggunakan hashing.

---

### 8.2.2 Dashboard Admin

Dashboard admin digunakan sebagai halaman utama setelah admin berhasil login.

Kebutuhan fitur:

1. Menampilkan ringkasan jumlah data profil, informasi adat, kegiatan, struktur organisasi, dan galeri.
2. Menampilkan shortcut menu pengelolaan data.
3. Menampilkan kegiatan terbaru.
4. Menampilkan pesan atau informasi sistem.
5. Menyediakan navigasi ke seluruh menu admin.

Acceptance criteria:

1. Dashboard hanya dapat diakses oleh admin yang sudah login.
2. Dashboard menampilkan ringkasan data secara benar.
3. Menu dashboard dapat mengarahkan admin ke fitur pengelolaan data.
4. Tampilan dashboard sederhana dan mudah dipahami.

---

### 8.2.3 Manajemen Profil Desa

Fitur ini digunakan admin untuk mengelola informasi profil Desa Poto.

Kebutuhan fitur:

1. Admin dapat menambah data profil desa.
2. Admin dapat mengubah data profil desa.
3. Admin dapat menghapus data profil desa.
4. Admin dapat mengunggah gambar profil desa.
5. Admin dapat menyimpan perubahan data.

Acceptance criteria:

1. Admin dapat menyimpan data profil desa.
2. Admin dapat memperbarui informasi profil desa.
3. Data profil desa yang diperbarui tampil pada halaman publik.
4. Sistem menampilkan pesan berhasil setelah data disimpan.
5. Sistem menampilkan validasi jika data wajib belum diisi.

---

### 8.2.4 Manajemen Informasi Adat

Fitur ini digunakan admin untuk mengelola data informasi adat.

Kebutuhan fitur:

1. Admin dapat menambah informasi adat.
2. Admin dapat mengubah informasi adat.
3. Admin dapat menghapus informasi adat.
4. Admin dapat mengisi judul, deskripsi, kategori, dan gambar.
5. Admin dapat melihat daftar informasi adat yang sudah dibuat.

Acceptance criteria:

1. Admin dapat membuat informasi adat baru.
2. Informasi adat yang dibuat tampil pada halaman publik.
3. Admin dapat mengedit informasi adat.
4. Admin dapat menghapus informasi adat.
5. Sistem memberikan pesan konfirmasi sebelum data dihapus.

---

### 8.2.5 Manajemen Struktur Organisasi Adat

Fitur ini digunakan admin untuk mengelola data pengurus adat.

Kebutuhan fitur:

1. Admin dapat menambah data pengurus adat.
2. Admin dapat mengubah data pengurus adat.
3. Admin dapat menghapus data pengurus adat.
4. Admin dapat mengisi nama, jabatan, deskripsi, dan foto.
5. Admin dapat mengatur urutan tampilan pengurus, apabila diperlukan.

Acceptance criteria:

1. Data pengurus adat dapat ditambahkan oleh admin.
2. Data struktur organisasi tampil pada halaman publik.
3. Admin dapat memperbarui data pengurus adat.
4. Admin dapat menghapus data pengurus adat.
5. Sistem menampilkan validasi jika nama atau jabatan belum diisi.

---

### 8.2.6 Manajemen Kegiatan Adat

Fitur ini digunakan admin untuk mengelola informasi jadwal dan pelaksanaan kegiatan adat.

Kebutuhan fitur:

1. Admin dapat menambah kegiatan adat.
2. Admin dapat mengubah kegiatan adat.
3. Admin dapat menghapus kegiatan adat.
4. Admin dapat mengisi nama kegiatan, tanggal, lokasi, deskripsi, dan gambar.
5. Admin dapat menentukan status kegiatan.

Acceptance criteria:

1. Kegiatan adat dapat ditambahkan oleh admin.
2. Kegiatan adat yang ditambahkan tampil pada halaman publik.
3. Admin dapat memperbarui data kegiatan.
4. Admin dapat menghapus kegiatan.
5. Data kegiatan dapat digunakan untuk notifikasi kegiatan.

---

### 8.2.7 Manajemen Galeri

Fitur ini digunakan admin untuk mengelola dokumentasi kegiatan adat.

Kebutuhan fitur:

1. Admin dapat mengunggah foto dokumentasi.
2. Admin dapat menambahkan judul foto.
3. Admin dapat menambahkan deskripsi foto.
4. Admin dapat menghapus foto.
5. Admin dapat mengubah informasi foto.
6. Admin dapat mengelompokkan foto berdasarkan kegiatan, apabila diperlukan.

Acceptance criteria:

1. Foto dapat diunggah oleh admin.
2. Foto yang diunggah tampil di halaman galeri.
3. Admin dapat mengubah informasi foto.
4. Admin dapat menghapus foto.
5. Sistem hanya menerima format gambar yang valid, seperti JPG, JPEG, PNG, atau WebP.

---

### 8.2.8 Manajemen Notifikasi Kegiatan

Fitur ini bersifat pendukung dan digunakan untuk mengelola pemberitahuan kegiatan adat.

Kebutuhan fitur:

1. Admin dapat membuat notifikasi kegiatan.
2. Admin dapat mengubah notifikasi.
3. Admin dapat menghapus notifikasi.
4. Notifikasi dapat dikaitkan dengan data kegiatan adat.
5. Notifikasi dapat ditampilkan pada halaman publik.

Acceptance criteria:

1. Admin dapat membuat notifikasi kegiatan.
2. Notifikasi tampil pada halaman publik.
3. Admin dapat mengubah atau menghapus notifikasi.
4. Notifikasi dapat membantu masyarakat mengetahui kegiatan yang akan datang.

---

### 8.2.9 Manajemen Forum dan Komentar

Fitur ini bersifat pendukung dan digunakan admin untuk mengelola diskusi atau komentar masyarakat.

Kebutuhan fitur:

1. Admin dapat melihat daftar komentar.
2. Admin dapat menghapus komentar.
3. Admin dapat menyembunyikan komentar yang tidak sesuai.
4. Admin dapat melihat komentar berdasarkan informasi adat atau kegiatan.
5. Admin dapat menjaga agar forum tetap relevan dan sopan.

Acceptance criteria:

1. Admin dapat melihat komentar yang masuk.
2. Admin dapat menghapus komentar tertentu.
3. Komentar yang dihapus tidak tampil di halaman publik.
4. Sistem mendukung moderasi komentar sederhana.

---

### 9. Kebutuhan Fungsional

| Kode   | Kebutuhan Fungsional                                       | Prioritas |
| ------ | ---------------------------------------------------------- | --------- |
| FR-001 | Sistem menyediakan halaman beranda untuk masyarakat.       | Tinggi    |
| FR-002 | Sistem menyediakan halaman profil desa.                    | Tinggi    |
| FR-003 | Sistem menyediakan halaman informasi adat.                 | Tinggi    |
| FR-004 | Sistem menyediakan halaman struktur organisasi adat.       | Tinggi    |
| FR-005 | Sistem menyediakan halaman kegiatan adat.                  | Tinggi    |
| FR-006 | Sistem menyediakan halaman galeri dokumentasi.             | Tinggi    |
| FR-007 | Sistem menyediakan login admin.                            | Tinggi    |
| FR-008 | Admin dapat mengelola profil desa.                         | Tinggi    |
| FR-009 | Admin dapat mengelola informasi adat.                      | Tinggi    |
| FR-010 | Admin dapat mengelola struktur organisasi adat.            | Tinggi    |
| FR-011 | Admin dapat mengelola kegiatan adat.                       | Tinggi    |
| FR-012 | Admin dapat mengelola galeri dokumentasi.                  | Tinggi    |
| FR-013 | Admin dapat melakukan tambah, ubah, dan hapus data.        | Tinggi    |
| FR-014 | Masyarakat dapat mengakses informasi tanpa login.          | Tinggi    |
| FR-015 | Sistem menyediakan notifikasi kegiatan adat.               | Sedang    |
| FR-016 | Sistem menyediakan forum diskusi dan komentar.             | Sedang    |
| FR-017 | Admin dapat mengelola komentar masyarakat.                 | Sedang    |
| FR-018 | Sistem menyediakan pencarian informasi.                    | Sedang    |
| FR-019 | Sistem menampilkan pesan validasi saat data tidak lengkap. | Tinggi    |
| FR-020 | Sistem menyediakan fitur logout admin.                     | Tinggi    |

---

### 10. Kebutuhan Non-Fungsional

| Kode    | Kebutuhan Non-Fungsional | Deskripsi                                                                  |
| ------- | ------------------------ | -------------------------------------------------------------------------- |
| NFR-001 | Kemudahan Penggunaan     | Sistem harus mudah digunakan oleh admin dan masyarakat.                    |
| NFR-002 | Responsif                | Sistem dapat diakses melalui desktop, laptop, tablet, dan smartphone.      |
| NFR-003 | Keamanan                 | Halaman admin hanya dapat diakses oleh pengguna yang sudah login.          |
| NFR-004 | Validasi Data            | Sistem harus memvalidasi data sebelum disimpan.                            |
| NFR-005 | Kinerja                  | Halaman website dapat dimuat dengan cepat dan stabil.                      |
| NFR-006 | Kompatibilitas           | Sistem dapat berjalan pada browser modern seperti Google Chrome.           |
| NFR-007 | Keterbacaan Informasi    | Konten harus disusun rapi, jelas, dan mudah dipahami.                      |
| NFR-008 | Keandalan                | Sistem harus dapat menyimpan, mengubah, dan menampilkan data dengan benar. |
| NFR-009 | Maintainability          | Struktur kode dan database harus mudah dikembangkan kembali.               |
| NFR-010 | Backup Data              | Data sistem sebaiknya dapat dicadangkan secara berkala.                    |

---

### 11. Struktur Menu Sistem

#### 11.1 Menu Publik

1. Beranda
2. Profil Desa
3. Informasi Adat
4. Struktur Organisasi Adat
5. Kegiatan Adat
6. Galeri
7. Notifikasi Kegiatan
8. Forum Diskusi
9. Login Admin

#### 11.2 Menu Admin

1. Dashboard
2. Kelola Profil Desa
3. Kelola Informasi Adat
4. Kelola Struktur Organisasi Adat
5. Kelola Kegiatan Adat
6. Kelola Galeri
7. Kelola Notifikasi
8. Kelola Forum/Komentar
9. Logout

---

### 12. Alur Pengguna

#### 12.1 Alur Masyarakat Melihat Informasi Adat

1. Masyarakat membuka website.
2. Sistem menampilkan halaman beranda.
3. Masyarakat memilih menu informasi adat.
4. Sistem menampilkan daftar informasi adat.
5. Masyarakat memilih salah satu informasi adat.
6. Sistem menampilkan detail informasi adat.
7. Masyarakat membaca informasi yang tersedia.

#### 12.2 Alur Masyarakat Melihat Kegiatan Adat

1. Masyarakat membuka website.
2. Masyarakat memilih menu kegiatan adat.
3. Sistem menampilkan daftar kegiatan adat.
4. Masyarakat memilih salah satu kegiatan.
5. Sistem menampilkan detail kegiatan, tanggal, lokasi, dan deskripsi.

#### 12.3 Alur Admin Mengelola Data

1. Admin membuka halaman login.
2. Admin memasukkan username/email dan password.
3. Sistem memvalidasi data login.
4. Jika login berhasil, sistem menampilkan dashboard admin.
5. Admin memilih menu pengelolaan data.
6. Admin menambah, mengubah, atau menghapus data.
7. Sistem menyimpan perubahan.
8. Data yang telah diperbarui tampil pada halaman publik.

---

### 13. Use Case Sistem

#### 13.1 Aktor

1. Admin
2. Masyarakat

#### 13.2 Use Case Admin

1. Login
2. Mengelola profil desa
3. Mengelola informasi adat
4. Mengelola struktur organisasi adat
5. Mengelola kegiatan adat
6. Mengelola galeri
7. Mengelola notifikasi kegiatan
8. Mengelola forum dan komentar
9. Logout

#### 13.3 Use Case Masyarakat

1. Melihat beranda
2. Melihat profil desa
3. Melihat informasi adat
4. Melihat struktur organisasi adat
5. Melihat kegiatan adat
6. Melihat galeri
7. Melihat notifikasi kegiatan
8. Melihat forum diskusi dan komentar

---

### 14. Rancangan Entitas Data

#### 14.1 Admin

Atribut utama:

1. id_admin
2. nama
3. username/email
4. password
5. created_at
6. updated_at

#### 14.2 Profil Desa

Atribut utama:

1. id_profil
2. judul
3. deskripsi
4. gambar
5. created_at
6. updated_at

#### 14.3 Informasi Adat

Atribut utama:

1. id_adat
2. judul
3. kategori
4. deskripsi
5. gambar
6. status_publikasi
7. created_at
8. updated_at

#### 14.4 Struktur Organisasi Adat

Atribut utama:

1. id_pengurus
2. nama
3. jabatan
4. deskripsi
5. foto
6. urutan
7. created_at
8. updated_at

#### 14.5 Kegiatan Adat

Atribut utama:

1. id_kegiatan
2. nama_kegiatan
3. tanggal
4. lokasi
5. deskripsi
6. gambar
7. status_kegiatan
8. created_at
9. updated_at

#### 14.6 Galeri

Atribut utama:

1. id_galeri
2. judul
3. deskripsi
4. gambar
5. id_kegiatan
6. tanggal_dokumentasi
7. created_at
8. updated_at

#### 14.7 Notifikasi

Atribut utama:

1. id_notifikasi
2. judul
3. isi
4. id_kegiatan
5. status
6. created_at
7. updated_at

#### 14.8 Komentar

Atribut utama:

1. id_komentar
2. nama_pengirim
3. isi_komentar
4. id_adat/id_kegiatan
5. status
6. created_at
7. updated_at

---

### 15. Rekomendasi Struktur Database

#### 15.1 Tabel `admins`

Digunakan untuk menyimpan data akun admin.

Kolom:

1. id
2. name
3. username
4. email
5. password
6. created_at
7. updated_at

#### 15.2 Tabel `village_profiles`

Digunakan untuk menyimpan profil Desa Poto.

Kolom:

1. id
2. title
3. description
4. image
5. created_at
6. updated_at

#### 15.3 Tabel `custom_information`

Digunakan untuk menyimpan informasi adat.

Kolom:

1. id
2. title
3. category
4. description
5. image
6. status
7. created_at
8. updated_at

#### 15.4 Tabel `custom_organizations`

Digunakan untuk menyimpan struktur organisasi adat.

Kolom:

1. id
2. name
3. position
4. description
5. photo
6. sort_order
7. created_at
8. updated_at

#### 15.5 Tabel `custom_events`

Digunakan untuk menyimpan kegiatan adat.

Kolom:

1. id
2. title
3. event_date
4. location
5. description
6. image
7. status
8. created_at
9. updated_at

#### 15.6 Tabel `galleries`

Digunakan untuk menyimpan dokumentasi kegiatan adat.

Kolom:

1. id
2. title
3. description
4. image
5. event_id
6. documentation_date
7. created_at
8. updated_at

#### 15.7 Tabel `notifications`

Digunakan untuk menyimpan notifikasi kegiatan.

Kolom:

1. id
2. title
3. message
4. event_id
5. status
6. created_at
7. updated_at

#### 15.8 Tabel `comments`

Digunakan untuk menyimpan komentar masyarakat.

Kolom:

1. id
2. sender_name
3. comment
4. reference_type
5. reference_id
6. status
7. created_at
8. updated_at

---

### 16. Prioritas Pengembangan

#### 16.1 MVP / Fitur Wajib

Fitur yang wajib dibangun pada tahap awal:

1. Halaman beranda.
2. Halaman profil desa.
3. Halaman informasi adat.
4. Halaman struktur organisasi adat.
5. Halaman kegiatan adat.
6. Halaman galeri.
7. Login admin.
8. Dashboard admin.
9. CRUD profil desa.
10. CRUD informasi adat.
11. CRUD struktur organisasi adat.
12. CRUD kegiatan adat.
13. CRUD galeri.

#### 16.2 Fitur Pendukung

Fitur yang dapat dikembangkan setelah fitur wajib selesai:

1. Notifikasi kegiatan adat.
2. Forum diskusi dan komentar.
3. Pencarian informasi adat.
4. Kategori informasi adat.
5. Filter kegiatan berdasarkan status.
6. Dashboard statistik sederhana.

---

### 17. Metode Pengembangan Sistem

Sistem dikembangkan menggunakan metode Rapid Application Development (RAD). Tahapan pengembangan sistem adalah sebagai berikut:

#### 17.1 Perencanaan Kebutuhan

Pada tahap ini dilakukan identifikasi masalah, pengumpulan data, dan analisis kebutuhan pengguna. Data diperoleh melalui observasi, wawancara, dan studi pustaka.

Output tahap ini:

1. Daftar kebutuhan pengguna.
2. Daftar fitur sistem.
3. Batasan sistem.
4. Kebutuhan perangkat keras dan perangkat lunak.

#### 17.2 Desain Sistem

Pada tahap ini dilakukan perancangan sistem menggunakan UML dan rancangan antarmuka.

Output tahap ini:

1. Use Case Diagram.
2. Activity Diagram.
3. Class Diagram.
4. Sequence Diagram.
5. Rancangan database.
6. Rancangan tampilan antarmuka.

#### 17.3 Pengembangan / Konstruksi

Pada tahap ini sistem mulai dibangun menggunakan bahasa pemrograman PHP dan database MySQL. Proses pengembangan dilakukan berdasarkan rancangan yang telah dibuat.

Output tahap ini:

1. Halaman publik.
2. Halaman admin.
3. Fitur login.
4. Fitur CRUD.
5. Database sistem.
6. Integrasi halaman publik dan admin.

#### 17.4 Implementasi

Pada tahap ini sistem diuji dan diterapkan kepada pengguna, yaitu admin desa dan masyarakat. Jika ditemukan kekurangan, sistem diperbaiki sesuai masukan pengguna.

Output tahap ini:

1. Sistem siap digunakan.
2. Hasil pengujian.
3. Perbaikan sistem.
4. Dokumentasi penggunaan sistem.

---

### 18. Kebutuhan Teknologi

#### 18.1 Perangkat Keras

1. Laptop atau komputer.
2. Processor minimal Intel Core i3.
3. RAM minimal 8 GB.
4. Penyimpanan yang cukup untuk file aplikasi dan database.

#### 18.2 Perangkat Lunak

1. Sistem Operasi Windows 11.
2. Web browser Google Chrome.
3. Bahasa pemrograman PHP.
4. Database MySQL.
5. Text editor Visual Studio Code.
6. Web server lokal seperti XAMPP atau Laragon.
7. Browser untuk pengujian tampilan.

---

### 19. Rekomendasi Halaman Antarmuka

#### 19.1 Halaman Publik

1. Beranda
   Menampilkan informasi utama website, pengantar Desa Poto, kegiatan terbaru, dan galeri terbaru.

2. Profil Desa
   Menampilkan informasi lengkap mengenai Desa Poto.

3. Informasi Adat
   Menampilkan daftar dan detail informasi adat.

4. Struktur Organisasi
   Menampilkan daftar pengurus adat.

5. Kegiatan Adat
   Menampilkan jadwal dan detail kegiatan adat.

6. Galeri
   Menampilkan dokumentasi kegiatan adat.

7. Forum Diskusi
   Menampilkan komentar atau diskusi masyarakat, apabila fitur digunakan.

8. Login Admin
   Halaman masuk untuk pengelola sistem.

#### 19.2 Halaman Admin

1. Dashboard
   Menampilkan ringkasan data sistem.

2. Kelola Profil Desa
   Menambah, mengubah, dan menghapus profil desa.

3. Kelola Informasi Adat
   Menambah, mengubah, dan menghapus informasi adat.

4. Kelola Struktur Organisasi
   Menambah, mengubah, dan menghapus data pengurus adat.

5. Kelola Kegiatan Adat
   Menambah, mengubah, dan menghapus kegiatan adat.

6. Kelola Galeri
   Mengunggah, mengubah, dan menghapus dokumentasi adat.

7. Kelola Notifikasi
   Mengelola pemberitahuan kegiatan adat.

8. Kelola Komentar
   Melihat dan menghapus komentar masyarakat.

---

### 20. Pengujian Sistem

Pengujian sistem dilakukan menggunakan metode Black Box Testing. Pengujian ini berfokus pada fungsi sistem tanpa melihat struktur kode program.

#### 20.1 Skenario Pengujian Login Admin

| No | Skenario                                     | Hasil yang Diharapkan                |
| -- | -------------------------------------------- | ------------------------------------ |
| 1  | Admin memasukkan username dan password benar | Sistem masuk ke dashboard            |
| 2  | Admin memasukkan password salah              | Sistem menampilkan pesan gagal login |
| 3  | Admin mengosongkan username/password         | Sistem menampilkan pesan validasi    |
| 4  | Admin logout dari sistem                     | Sistem kembali ke halaman login      |

#### 20.2 Skenario Pengujian Kelola Informasi Adat

| No | Skenario                       | Hasil yang Diharapkan                       |
| -- | ------------------------------ | ------------------------------------------- |
| 1  | Admin menambah informasi adat  | Data tersimpan dan tampil di halaman publik |
| 2  | Admin mengubah informasi adat  | Data berhasil diperbarui                    |
| 3  | Admin menghapus informasi adat | Data terhapus dari sistem                   |
| 4  | Admin menyimpan data kosong    | Sistem menampilkan validasi                 |

#### 20.3 Skenario Pengujian Kelola Kegiatan Adat

| No | Skenario                            | Hasil yang Diharapkan              |
| -- | ----------------------------------- | ---------------------------------- |
| 1  | Admin menambah kegiatan adat        | Data kegiatan tersimpan            |
| 2  | Admin mengubah kegiatan adat        | Data kegiatan diperbarui           |
| 3  | Admin menghapus kegiatan adat       | Data kegiatan terhapus             |
| 4  | Masyarakat membuka halaman kegiatan | Sistem menampilkan daftar kegiatan |

#### 20.4 Skenario Pengujian Galeri

| No | Skenario                            | Hasil yang Diharapkan               |
| -- | ----------------------------------- | ----------------------------------- |
| 1  | Admin mengunggah foto               | Foto tersimpan dan tampil di galeri |
| 2  | Admin mengunggah file selain gambar | Sistem menolak file                 |
| 3  | Admin menghapus foto                | Foto tidak tampil lagi              |
| 4  | Masyarakat membuka galeri           | Sistem menampilkan dokumentasi adat |

---

### 21. Indikator Keberhasilan Sistem

Sistem dinyatakan berhasil apabila:

1. Admin dapat login ke dalam sistem.
2. Admin dapat mengelola profil desa.
3. Admin dapat mengelola informasi adat.
4. Admin dapat mengelola struktur organisasi adat.
5. Admin dapat mengelola kegiatan adat.
6. Admin dapat mengelola galeri dokumentasi.
7. Masyarakat dapat mengakses informasi tanpa login.
8. Data yang dikelola admin tampil pada halaman publik.
9. Sistem dapat membantu dokumentasi adat secara digital.
10. Sistem mudah digunakan oleh admin dan masyarakat.
11. Sistem berjalan dengan baik pada browser.
12. Sistem mendukung tujuan pelestarian budaya lokal Desa Poto.

---

### 22. Risiko dan Mitigasi

| Risiko                                  | Dampak                           | Mitigasi                                                       |
| --------------------------------------- | -------------------------------- | -------------------------------------------------------------- |
| Admin belum terbiasa menggunakan sistem | Pengelolaan data kurang optimal  | Berikan panduan penggunaan dan pelatihan singkat               |
| Data adat belum lengkap                 | Konten website kurang informatif | Lakukan pengumpulan data bersama perangkat desa dan tetua adat |
| Foto dokumentasi berukuran besar        | Website lambat diakses           | Kompres gambar sebelum diunggah                                |
| Password admin bocor                    | Keamanan sistem terganggu        | Gunakan password kuat dan hashing                              |
| Koneksi internet tidak stabil           | Website sulit diakses            | Sistem tetap dapat diuji secara lokal sebelum online           |
| Komentar tidak pantas pada forum        | Mengganggu kualitas informasi    | Terapkan moderasi komentar oleh admin                          |

---

### 23. Timeline Pengembangan

| Tahap   | Aktivitas                                                                            | Estimasi |
| ------- | ------------------------------------------------------------------------------------ | -------- |
| Tahap 1 | Analisis kebutuhan dan pengumpulan data                                              | 1 minggu |
| Tahap 2 | Perancangan UML dan database                                                         | 1 minggu |
| Tahap 3 | Desain antarmuka halaman publik dan admin                                            | 1 minggu |
| Tahap 4 | Pengembangan fitur login dan dashboard admin                                         | 1 minggu |
| Tahap 5 | Pengembangan fitur profil, informasi adat, struktur organisasi, kegiatan, dan galeri | 2 minggu |
| Tahap 6 | Pengembangan fitur pendukung seperti notifikasi dan forum                            | 1 minggu |
| Tahap 7 | Pengujian black box                                                                  | 1 minggu |
| Tahap 8 | Implementasi dan perbaikan                                                           | 1 minggu |

---

### 24. Kesimpulan PRD

Sistem Informasi Adat Desa Poto Berbasis Web dirancang sebagai solusi digital untuk membantu pengelolaan dan penyebaran informasi adat secara lebih efektif, efisien, dan terstruktur. Sistem ini memiliki dua aktor utama, yaitu admin dan masyarakat. Admin bertugas mengelola data, sedangkan masyarakat dapat mengakses informasi adat tanpa perlu login.

Fitur utama sistem meliputi profil desa, informasi adat, struktur organisasi adat, kegiatan adat, galeri dokumentasi, dan login admin. Fitur pendukung seperti notifikasi kegiatan dan forum diskusi dapat ditambahkan untuk meningkatkan interaksi dan penyebaran informasi kepada masyarakat.

Dengan adanya sistem ini, informasi adat Desa Poto dapat terdokumentasi dengan baik, mudah diakses, dan dapat mendukung upaya pelestarian budaya lokal agar tetap dikenal oleh masyarakat saat ini maupun generasi berikutnya.
