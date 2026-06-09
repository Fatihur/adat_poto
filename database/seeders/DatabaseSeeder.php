<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Galeri;
use App\Models\InformasiAdat;
use App\Models\KegiatanAdat;
use App\Models\PengurusAdat;
use App\Models\ProfilDesa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@desapoto.id'],
            [
                'nama' => 'Administrator Desa Poto',
                'kata_sandi' => Hash::make('password'),
            ]
        );

        ProfilDesa::updateOrCreate(
            ['judul' => 'Tentang Desa Poto'],
            [
                'deskripsi' => 'Desa Poto merupakan salah satu desa yang terletak di Kecamatan Moyo Hilir, Kabupaten Sumbawa, Provinsi Nusa Tenggara Barat. Desa ini memiliki luas wilayah sekitar 12,5 km\u00b2 yang terdiri atas beberapa dusun, yakni Dusun Poto, Dusun Pangguh, dan Dusun Karang Dima.\r\n\r\n'
                    . 'Masyarakat Desa Poto mayoritas bersuku Sumbawa (Samawa) dengan mata pencaharian utama sebagai petani, pekebun, dan peternak. Komoditas unggulan desa ini meliputi padi, jagung, kacang tanah, serta hasil hutan seperti kemiri dan bambu.\r\n\r\n'
                    . 'Desa Poto dikenal memiliki kekayaan adat dan budaya yang masih terjaga dengan baik. Berbagai tradisi seperti Ponan (syukuran panen), Besaleq (ritual pengobatan tradisional), Nyorong (lamaran adat), serta kesenian tradisional seperti Bateq (tenun ikat) dan Lawang Sakepeng (tarian adat) masih lestari dan diwariskan secara turun-temurun.\r\n\r\n'
                    . 'Pemerintah desa bersama lembaga adat setempat terus berupaya melestarikan nilai-nilai budaya ini melalui berbagai kegiatan adat tahunan dan dokumentasi digital, sehingga generasi muda dapat mengenal dan menjaga warisan leluhur.',
                'gambar' => 'profil/desa-poto.jpg',
            ]
        );

        $gambarInformasi = [
            'informasi/info-1.jpg',
            'informasi/info-2.jpg',
            'informasi/info-3.jpg',
            'informasi/info-4.jpg',
            'informasi/info-5.jpg',
            'informasi/info-6.jpg',
        ];

        $informasi = [
            [
                'judul' => 'Upacara Ponan — Syukur Atas Hasil Panen',
                'kategori' => 'Upacara Adat',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[0],
                'deskripsi' => "Ponan adalah upacara adat tahunan masyarakat Sumbawa, termasuk Desa Poto, sebagai wujud syukur kepada Tuhan Yang Maha Esa atas hasil pertanian yang diperoleh. Upacara ini dilaksanakan setelah musim panen raya, biasanya pada bulan April hingga Juni.\r\n\r\n"
                    . "**Tahapan Upacara Ponan:**\r\n\r\n"
                    . "1. **Mita (Musyawarah Awal)** — Para tetua adat dan tokoh masyarakat berkumpul di balai desa untuk menentukan hari baik pelaksanaan Ponan berdasarkan perhitungan kalender adat Sumbawa (Taun Samawa).\r\n\r\n"
                    . "2. **Bersih Dusun (Roah Gawah)** — Seluruh warga bergotong royong membersihkan lingkungan desa, sumber mata air, dan area sekitar makam leluhur sebagai bentuk penyucian diri dan lingkungan.\r\n\r\n"
                    . "3. **Menyiapkan Sesajen (Semekat)** — Masyarakat menyiapkan sesajen berupa hasil bumi seperti padi, jagung, pisang, kelapa, ketan, dan ayam panggang. Sesajen ini ditempatkan di atas anyaman bambu (nyiru) yang dihias dengan janur kuning.\r\n\r\n"
                    . "4. **Doa Bersama (Baca Doa)** — Dipimpin oleh Ketua Adat atau Kiai, seluruh warga berkumpul di lapangan desa atau di bawah pohon besar yang dianggap keramat. Doa dipanjatkan untuk keselamatan dan keberkahan desa, serta penghormatan kepada leluhur.\r\n\r\n"
                    . "5. **Makan Bersama (Makan Bajambau)** — Setelah doa, seluruh warga makan bersama dengan hidangan yang telah disiapkan. Hidangan khas yang disajikan antara lain sepat (nasi dibungkus daun pisang), ayam talak (ayam masak kuning), jaje urap (kue tradisional), dan tape ketan.\r\n\r\n"
                    . "6. **Pertunjukan Kesenian** — Acara diakhiri dengan pertunjukan seni tradisional seperti tarian Lawang Sakepeng, silat Samawa, dan gendang beleq. Pada malam harinya, diadakan acara hiburan rakyat seperti pencak silat dan pembacaan syair adat.\r\n\r\n"
                    . "Nilai filosofis Ponan adalah pengingat bahwa manusia harus selalu bersyukur, menjaga kebersamaan, dan menghormati alam sebagai sumber kehidupan. Hingga saat ini, Ponan masih rutin dilaksanakan setiap tahun oleh masyarakat Desa Poto.",
            ],
            [
                'judul' => 'Adat Perkawinan Sumbawa',
                'kategori' => 'Perkawinan',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => "Perkawinan adat Sumbawa di Desa Poto merupakan rangkaian prosesi yang sarat dengan nilai-nilai kekeluargaan, gotong royong, dan penghormatan kepada leluhur. Prosesi ini terdiri dari beberapa tahapan yang berlangsung selama beberapa hari hingga minggu.\r\n\r\n"
                    . "**Tahapan Perkawinan Adat:**\r\n\r\n"
                    . "1. **Baselo (Pendekatan Awal)** — Keluarga pihak laki-laki mengutus seorang juru bicara (kepala adat atau kerabat terdekat) untuk menyampaikan niat baik kepada keluarga pihak perempuan. Baselo biasanya dilakukan dengan membawa sirih pinang (ngo) sebagai simbol penghormatan.\r\n\r\n"
                    . "2. **Nyorong (Lamaran Resmi)** — Prosesi lamaran secara resmi dengan membawa barang hantaran berupa uang, kain, perhiasan, dan makanan tradisional. Barang hantaran ini disebut \"seserahan\" dan jumlahnya telah ditentukan melalui musyawarah sebelumnya. Masyarakat Desa Poto biasanya mengarak barang hantaran ini dari rumah calon mempelai laki-laki ke rumah calon mempelai perempuan dengan iring-iringan keluarga dan tetangga.\r\n\r\n"
                    . "3. **Mappak Lewo (Akad Nikah)** — Akad nikah dilaksanakan di rumah mempelai perempuan atau di masjid. Prosesi ini dipimpin oleh penghulu dan disaksikan oleh saksi dari kedua belah pihak serta tokoh adat. Mas kawin yang umum di Sumbawa adalah uang logam perak dan seperangkat alat salat.\r\n\r\n"
                    . "4. **Barapan (Resepsi Resmi)** — Pesta pernikahan yang biasanya digelar secara meriah dengan mengundang seluruh warga desa. Hidangan khas yang disajikan antara lain singang (ikan atau ayam masak kuning berbumbu tamarind), balaput (sate kerang), dan jaje khas Sumbawa.\r\n\r\n"
                    . "5. **Mano (Tradisi Tiga Hari)** — Setelah resepsi, pengantin baru menjalani tradisi Mano, yaitu tinggal di rumah mempelai perempuan selama tiga hari sebagai bentuk penghormatan dan perkenalan dengan keluarga besar. Pada masa ini, pengantin laki-laki membantu pekerjaan rumah mertua sebagai simbol tanggung jawab.\r\n\r\n"
                    . "6. **Nundong (Pemberian Nasehat)** — Para tetua adat memberikan nasihat perkawinan kepada kedua mempelai yang dirangkai dalam syair-syair adat berbahasa Samawa. Syair ini berisi petuah tentang bagaimana menjadi suami-istri yang baik, menjaga keharmonisan rumah tangga, serta pentingnya gotong royong dalam kehidupan bermasyarakat.\r\n\r\n"
                    . "Pakaian adat yang dikenakan adalah kain tenun Bateq khas Sumbawa dengan motif khas seperti motif keker (garis vertikal) dan motif kait (simbol keabadian).",
            ],
            [
                'judul' => 'Tradisi Besaleq — Ritual Pengobatan Tradisional',
                'kategori' => 'Ritual',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[2],
                'deskripsi' => "Besaleq merupakan ritual pengobatan tradisional yang masih dipraktikkan oleh masyarakat Desa Poto dan beberapa desa lain di Sumbawa. Ritual ini bertujuan untuk menyembuhkan penyakit yang diyakini disebabkan oleh gangguan roh halus, santet, atau ketidakseimbangan energi spiritual.\r\n\r\n"
                    . "**Prosesi Besaleq:**\r\n\r\n"
                    . "1. **Pemanggilan Dukun (Sando)** — Ritual dipimpin oleh seorang dukun tradisional yang disebut Sando Besaleq. Sando ini biasanya adalah orang tua yang memiliki pengetahuan tentang mantra-mantra adat, ramuan herbal, serta kemampuan berkomunikasi dengan roh leluhur.\r\n\r\n"
                    . "2. **Persiapan Banten** — Keluarga pasien menyiapkan sesajen berupa nasi ketan, telur ayam kampung, sirih pinang, kemenyan, kain putih, dan sejumlah uang logam. Semua sesajen ditata di atas wadah bambu yang disebut bokor.\r\n\r\n"
                    . "3. **Pembacaan Mantra (Baca-baca)** — Sando membacakan mantra-mantra dalam bahasa Samawa kuno sambil membakar kemenyan. Asap kemenyan dipercaya sebagai media penghubung antara manusia dengan roh leluhur dan alam gaib.\r\n\r\n"
                    . "4. **Pengobatan Herbal** — Selain ritual spiritual, Sando juga memberikan ramuan herbal tradisional yang terbuat dari akar-akaran, daun-daunan, dan rempah-rempah seperti kunyit, jahe, sereh, dan daun sirsak. Ramuan ini diminum atau dioleskan pada bagian tubuh yang sakit.\r\n\r\n"
                    . "5. **Penyembelihan Ayam** — Ayam kampung disembelih dan darahnya dipercikkan di sekitar rumah pasien sebagai simbol penolak bala. Selanjutnya, ayam tersebut dimasak dan dimakan bersama oleh keluarga.\r\n\r\n"
                    . "Meskipun akses terhadap layanan kesehatan modern semakin mudah, tradisi Besaleq masih dipertahankan sebagai warisan budaya dan alternatif pengobatan spiritual. Pemerintah desa setempat tidak melarang praktik ini selama tidak menggantikan pengobatan medis untuk penyakit serius.",
            ],
            [
                'judul' => 'Tradisi Bajaga — Jaga Desa dan Malam Berjaga',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[3],
                'deskripsi' => "Bajaga adalah tradisi jaga malam yang dilakukan secara bergiliran oleh warga Desa Poto. Tradisi ini bukan sekadar kegiatan ronda biasa, melainkan sudah mengakar sebagai bentuk kewajiban adat setiap warga laki-laki dewasa yang sudah menikah.\r\n\r\n"
                    . "**Sistem Pelaksanaan:**\r\n\r\n"
                    . "Setiap malam, empat hingga enam orang laki-laki dari masing-masing dusun secara bergiliran melaksanakan Bajaga di pos jaga (poskamling) yang tersebar di beberapa titik strategis desa. Mereka membawa kentongan (teteak) yang terbuat dari bambu atau kayu sebagai alat komunikasi tradisional.\r\n\r\n"
                    . "**Kode Kentongan:**\r\n"
                    . "- Pukulan cepat dan rapat: tanda bahaya (kebakaran, pencurian, atau bencana alam)\r\n"
                    . "- Pukulan lambat tiga kali: suasana aman dan kondusif\r\n"
                    . "- Pukulan satu kali panjang: pergantian shift jaga\r\n\r\n"
                    . "**Nilai Budaya:**\r\n"
                    . "Bajaga mengajarkan nilai-nilai gotong royong, tanggung jawab sosial, serta kepedulian terhadap sesama. Warga yang tidak melaksanakan kewajiban Bajaga tanpa alasan yang sah akan dikenakan sanksi adat berupa teguran lisan hingga denda berupa beras atau kelapa untuk konsumsi bersama.\r\n\r\n"
                    . "Di era modern, tradisi Bajaga tetap berjalan beriringan dengan sistem keamanan lingkungan binaan (Satlinmas) yang difasilitasi oleh pemerintah desa. Kentongan masih digunakan sebagai alat komunikasi tradisional yang berdampingan dengan pengeras suara masjid dan grup WhatsApp desa.",
            ],
            [
                'judul' => 'Adat Kelahiran — Upacara Menyambut Bayi',
                'kategori' => 'Upacara Adat',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[4],
                'deskripsi' => "Masyarakat Desa Poto memiliki serangkaian upacara adat yang berkaitan dengan kelahiran bayi. Upacara ini bertujuan untuk memberikan perlindungan spiritual kepada bayi dan ibu, serta memperkenalkan anggota baru kepada masyarakat.\r\n\r\n"
                    . "**Rangkaian Upacara:**\r\n\r\n"
                    . "1. **Robo (Potong Tali Pusar)** — Dilakukan oleh dukun beranak (Sando Beranak) atau bidan desa. Tali pusar yang telah dipotong dikuburkan di halaman rumah bersama dengan rempah-rempah sebagai simbol harapan agar bayi tumbuh sehat dan kuat.\r\n\r\n"
                    . "2. **Nanya Oi (Mandi Bayi Pertama)** — Bayi dimandikan dengan air yang dicampur bunga-bunga dan daun-daunan tertentu seperti daun kemangi, daun pandan, dan bunga mawar. Air mandian ini dipercaya dapat membersihkan aura negatif dan memberikan energi positif.\r\n\r\n"
                    . "3. **Ngendo (Aqiqah)** — Upacara aqiqah dilaksanakan pada hari ketujuh setelah kelahiran. Kambing disembelih (dua ekor untuk bayi laki-laki, satu ekor untuk bayi perempuan) dan dagingnya dimasak serta dibagikan kepada tetangga, kerabat, dan fakir miskin.\r\n\r\n"
                    . "4. **Pemberian Nama (Mappak Nga)** — Nama bayi biasanya diberikan oleh Ketua Adat atau Kiai desa. Pemberian nama diawali dengan pembacaan doa dan azan di telinga kanan bayi serta iqamat di telinga kiri.\r\n\r\n"
                    . "5. **Notong (Pukul Tujuh Hari)** — Pada hari ketujuh, keluarga mengadakan syukuran kecil dengan mengundang tetangga terdekat. Hidangan khas yang disajikan adalah bubur merah putih (bubur sumsum) dan telur rebus yang dicelupkan ke dalam pewarna alami.\r\n\r\n"
                    . "Dalam setiap tahapan, nilai-nilai islami dan adat berpadu secara harmonis, mencerminkan sinkretisme budaya yang khas di Sumbawa.",
            ],
            [
                'judul' => 'Tradisi Maulid Adat Samawa',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[5],
                'deskripsi' => "Maulid Adat Samawa merupakan perayaan Maulid Nabi Muhammad SAW yang dirayakan dengan memadukan unsur keagamaan dan adat istiadat Sumbawa. Di Desa Poto, perayaan ini berlangsung selama tiga hari tiga malam dan melibatkan seluruh lapisan masyarakat.\r\n\r\n"
                    . "**Rangkaian Acara:**\r\n\r\n"
                    . "1. **Barzanji (Pembacaan Syair Maulid)** — Berlangsung di masjid atau langgar desa. Syair Barzanji dibacakan secara bergantian oleh para pemuda desa dengan irama khas Sumbawa. Suasana semakin khidmat dengan tabuhan rebana (terbang) yang mengiringi setiap bait syair.\r\n\r\n"
                    . "2. **Pawai Ta'aruf (Arak-arakan)** — Pada hari kedua, diadakan pawai keliling desa yang diikuti oleh anak-anak, remaja, dan orang dewasa. Peserta pawai membawa berbagai macam hiasan seperti janur, bendera, dan replika masjid yang terbuat dari bahan-bahan alami. Pawai diiringi dengan tabuhan gendang beleq dan rebana.\r\n\r\n"
                    . "3. **Maulid Adat** — Acara puncak digelar di lapangan desa dengan menampilkan berbagai kesenian tradisional seperti:\r\n"
                    . "   - Tarian Lawang Sakepeng (tarian selamat datang)\r\n"
                    . "   - Gendang Beleq (kesenian musik tradisional dengan gendang besar)\r\n"
                    . "   - Silat Samawa (pencak silat khas Sumbawa)\r\n"
                    . "   - Pembacaan syair Maulid dalam bahasa Samawa\r\n\r\n"
                    . "4. **Makan Bajambau** — Seluruh warga menikmati hidangan yang telah disiapkan secara gotong royong. Hidangan utama adalah nasi jajan (nasi kuning dengan lauk pauk) yang dihidangkan di atas anyaman bambu panjang (lesehan), sebagai simbol kebersamaan dan persaudaraan.\r\n\r\n"
                    . "Perayaan Maulid Adat Samawa merupakan momentum memperkuat silaturahmi antarmasyarakat dan menjadi ajang pelestarian seni budaya tradisional yang terus dijaga oleh generasi muda Desa Poto.",
            ],
            [
                'judul' => 'Kain Tenun Bateq Sumbawa',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[0],
                'deskripsi' => "Bateq adalah kain tenun tradisional khas Sumbawa yang telah ada sejak abad ke-16. Kain ini ditenun dengan alat tenun tradisional yang disebut Gedogan dan menggunakan benang katun atau benang sutra yang diwarnai dengan pewarna alami.\r\n\r\n"
                    . "**Motif dan Makna:**\r\n\r\n"
                    . "1. **Motif Keker** — Berbentuk garis-garis vertikal yang melambangkan kekokohan dan keteguhan pendirian. Motif ini biasanya digunakan oleh tetua adat dan pemimpin masyarakat.\r\n\r\n"
                    . "2. **Motif Kait** — Berbentuk anyaman kait yang melambangkan keberlanjutan kehidupan dan hubungan erat antara manusia dengan alam semesta.\r\n\r\n"
                    . "3. **Motif Bunga Cermai** — Berbentuk bunga cermai yang melambangkan keindahan, kelembutan, dan kesuburan. Motif ini sering digunakan untuk pakaian pengantin atau busana upacara adat.\r\n\r\n"
                    . "4. **Motif Tampak** — Motif segitiga yang melambangkan keharmonisan hubungan antar sesama manusia dan dengan Tuhan Yang Maha Esa.\r\n\r\n"
                    . "**Proses Pembuatan:**\r\n"
                    . "Proses menenun Bateq memakan waktu antara dua minggu hingga dua bulan tergantung kerumitan motif. Tahapannya meliputi:\r\n"
                    . "- Pemintalan benang (menggunakan kapas lokal)\r\n"
                    . "- Pewarnaan alami (dari daun indigo, kunyit, kulit kayu tingi, dan tanah liat)\r\n"
                    . "- Penenunan dengan alat Gedogan\r\n"
                    . "- Finishing (pengeringan dan penghalusan)\r\n\r\n"
                    . "**Pelestarian:**\r\n"
                    . "Di Desa Poto, tradisi menenun Bateq masih diajarkan secara turun-temurun oleh ibu-ibu dan remaja putri. Kelompok pengrajin tenun Bateq di desa ini telah terbentuk dan rutin mengikuti pameran kerajinan di tingkat kabupaten dan provinsi. Pemerintah daerah juga mendukung pelestarian Bateq melalui program pelatihan dan bantuan peralatan tenun.",
            ],
            [
                'judul' => 'Tarian Lawang Sakepeng',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => "Lawang Sakepeng adalah tarian tradisional khas Sumbawa yang berasal dari kata \"lawang\" (pintu) dan \"sakepeng\" (satu kepeng/uang logam). Tarian ini melambangkan keterbukaan dan keramahan masyarakat Sumbawa dalam menyambut tamu.\r\n\r\n"
                    . "**Sejarah dan Filosofi:**\r\n\r\n"
                    . "Lawang Sakepeng diciptakan pada masa Kesultanan Sumbawa sebagai tari penyambutan bagi tamu-tamu kerajaan. Uang logam (kepeng) yang menjadi properti utama tarian melambangkan kemakmuran dan kesejahteraan. Ketika pintu dibuka (lawang dibuka) dan uang logam diberikan (sakepeng), itu berarti tuan rumah memberikan penghormatan yang tulus kepada tamu.\r\n\r\n"
                    . "**Gerakan dan Properti:**\r\n\r\n"
                    . "Tarian ini dibawakan oleh 4 hingga 8 orang penari putri dengan gerakan yang gemulai namun penuh makna. Properti yang digunakan berupa:\r\n"
                    . "- Bokor (wadah kuningan) berisi uang logam kepeng\r\n"
                    . "- Selendang sutra warna kuning (simbol keagungan)\r\n"
                    . "- Kipas tradisional dari bambu dan kain\r\n\r\n"
                    . "Gerakan tarian terbagi menjadi tiga bagian:\r\n"
                    . "1. **Bagian Pembuka** — Penari memasuki arena dengan gerakan berjalan perlahan sambil menghormat kepada penonton.\r\n"
                    . "2. **Bagian Inti** — Penari membagikan uang kepeng kepada penonton sebagai simbol pemberian berkah dan rezeki.\r\n"
                    . "3. **Bagian Penutup** — Penari meninggalkan arena dengan gerakan mundur sebagai simbol penghormatan.\r\n\r\n"
                    . "**Iringan Musik:**\r\n"
                    . "Tarian Lawang Sakepeng diiringi oleh musik tradisional yang terdiri dari gendang, gong, serunai (alat tiup bambu), dan rebana. Irama yang dimainkan adalah irama gendang beleq yang rancak dan bersemangat.\r\n\r\n"
                    . "Di Desa Poto, Tarian Lawang Sakepeng rutin ditampilkan pada acara-acara adat, penyambutan tamu penting, dan festival budaya. Sanggar tari desa yang dikelola oleh pemuda-pemudi desa aktif melatih generasi muda untuk melestarikan tarian ini.",
            ],
            [
                'judul' => 'Sistem Pemerintahan Adat Desa Poto',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[2],
                'deskripsi' => "Pemerintahan adat di Desa Poto merupakan sistem kelembagaan tradisional yang telah ada jauh sebelum terbentuknya struktur pemerintahan desa modern. Lembaga adat ini tetap eksis dan berperan penting dalam menjaga tatanan sosial masyarakat.\r\n\r\n"
                    . "**Struktur Lembaga Adat:**\r\n\r\n"
                    . "1. **Tua Loka (Ketua Adat)** — Pemimpin tertinggi adat yang bertugas memimpin seluruh kegiatan adat dan menjadi penengah dalam penyelesaian sengketa adat. Tua Loka dipilih berdasarkan garis keturunan dan kearifan yang dimiliki. Masa jabatan berlangsung seumur hidup.\r\n\r\n"
                    . "2. **Tua Tenga (Wakil Ketua Adat)** — Membantu Tua Loka dalam pelaksanaan kegiatan adat dan menggantikannya apabila berhalangan hadir.\r\n\r\n"
                    . "3. **Sekretaris Adat** — Mengelola administrasi dan dokumentasi kegiatan adat, termasuk pencatatan silsilah keluarga, peristiwa adat, dan keputusan-keputusan penting lembaga adat.\r\n\r\n"
                    . "4. **Bendahara Adat** — Bertanggung jawab mengelola keuangan dan aset adat, termasuk tanah ulayat, hasil bumi dari tanah adat, serta sumbangan sukarela masyarakat.\r\n\r\n"
                    . "5. **Kiai (Penasihat Agama)** — Memberikan nasihat terkait aspek keagamaan dalam setiap kegiatan adat. Keberadaan Kiai memastikan bahwa setiap tradisi adat tidak bertentangan dengan ajaran Islam.\r\n\r\n"
                    . "6. **Sando (Dukun Adat)** — Ahli pengobatan tradisional dan spiritual yang berperan dalam ritual-ritual adat seperti Besaleq dan upacara kelahiran.\r\n\r\n"
                    . "7. **Kepala Dusun Adat** — Perwakilan lembaga adat di masing-masing dusun yang menjembatani komunikasi antara masyarakat dan Tua Loka.\r\n\r\n"
                    . "**Fungsi Lembaga Adat:**\r\n"
                    . "- Menetapkan kalender adat (Taun Samawa) untuk menentukan hari baik pelaksanaan kegiatan\r\n"
                    . "- Mengadili sengketa adat seperti sengketa tanah, perkawinan, dan pelanggaran norma adat\r\n"
                    . "- Mengelola tanah ulayat dan hutan adat\r\n"
                    . "- Menyelenggarakan upacara adat tahunan\r\n"
                    . "- Memberikan saran dan pertimbangan kepada pemerintah desa dalam pengambilan keputusan yang berkaitan dengan budaya dan tradisi\r\n\r\n"
                    . "Lembaga adat Desa Poto saat ini terus beradaptasi dengan perkembangan zaman tanpa meninggalkan nilai-nilai luhur yang telah diwariskan oleh leluhur.",
            ],
            [
                'judul' => 'Tradisi Lako — Gotong Royong ala Sumbawa',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[3],
                'deskripsi' => "Lako adalah tradisi gotong royong khas masyarakat Sumbawa yang sudah mengakar kuat di Desa Poto. Berbeda dengan gotong royong pada umumnya, Lako memiliki aturan dan tata cara yang diatur oleh adat.\r\n\r\n"
                    . "**Bentuk-bentuk Lako:**\r\n\r\n"
                    . "1. **Lako Nguma** — Gotong royong membantu warga yang akan menempati rumah baru. Warga secara sukarela membantu membersihkan, mengecat, dan mengatur perabotan rumah. Sebagai imbalan, tuan rumah menyediakan hidangan sederhana berupa kopi dan jaje tradisional.\r\n\r\n"
                    . "2. **Lako Uma** — Gotong royong di sawah atau ladang milik warga, terutama saat musim tanam dan musim panen. Sekelompok warga secara bergiliran membantu mengerjakan lahan anggota kelompok lainnya. Sistem ini efisien dan mempererat hubungan antarwarga.\r\n\r\n"
                    . "3. **Lako Nikah** — Gotong royong dalam mempersiapkan acara pernikahan. Warga membantu mendirikan tenda, menyiapkan hidangan, membersihkan lingkungan, dan melayani tamu. Tuan rumah cukup menyediakan bahan makanan dan minuman.\r\n\r\n"
                    . "4. **Lako Kematian** — Gotong royong saat ada warga yang meninggal dunia. Warga secara spontan membantu mempersiapkan pemakaman, menggali kubur, memandikan jenazah, menyiapkan konsumsi, dan mengurus surat-surat kematian. Lako Kematian merupakan salah satu tradisi yang paling kuat dipegang oleh masyarakat.\r\n\r\n"
                    . "5. **Lako Bala** — Gotong royong saat terjadi bencana alam seperti banjir, longsor, atau kebakaran. Warga secara sigap bahu-membahu mengevakuasi korban, membersihkan puing-puing, dan membangun kembali rumah yang rusak.\r\n\r\n"
                    . "**Sistem Pencatatan Lako:**\r\n"
                    . "Setiap kepala keluarga diwajibkan untuk berpartisipasi dalam kegiatan Lako. Partisipasi dicatat oleh Ketua RT atau Kepala Dusun. Warga yang tidak hadir tanpa alasan sah akan dicatat sebagai \"hutang Lako\" yang harus dibayar pada kesempatan berikutnya.\r\n\r\n"
                    . "Nilai filosofis Lako adalah pengingat bahwa manusia tidak dapat hidup sendiri dan harus saling membantu. Tradisi ini menjadi perekat sosial yang sangat kuat di masyarakat Desa Poto hingga saat ini.",
            ],
            [
                'judul' => 'Upacara Adat Kematian',
                'kategori' => 'Upacara Adat',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[4],
                'deskripsi' => "Upacara adat kematian di Desa Poto merupakan rangkaian prosesi yang memadukan syariat Islam dengan tradisi lokal. Masyarakat meyakini bahwa kematian bukanlah akhir, melainkan perpindahan menuju kehidupan abadi di akhirat.\r\n\r\n"
                    . "**Tahapan Upacara:**\r\n\r\n"
                    . "1. **Melepas (Memandikan Jenazah)** — Jenazah dimandikan oleh keluarga terdekat yang dipandu oleh Kiai atau tokoh agama. Air mandian dicampur dengan kapur barus dan daun bidara sebagai simbol penyucian. Kain kafan yang digunakan biasanya merupakan kain tenun Bateq polos berwarna putih.\r\n\r\n"
                    . "2. **Menyembahyangkan** — Salat jenazah dilaksanakan di masjid atau langgar desa dengan diimami oleh Kiai. Seluruh warga desa diundang untuk ikut menyembahyangkan.\r\n\r\n"
                    . "3. **Ngendo (Pemakaman)** — Jenazah diusung ke pemakaman umum desa dengan iring-iringan warga yang berjalan kaki. Sepanjang perjalanan, warga membaca kalimat thayyibah. Di area pemakaman, jenazah dimakamkan dengan menghadap kiblat dan batu nisan diletakkan di atas makam.\r\n\r\n"
                    . "4. **Tahlilan (Tiga Hari)** — Selama tiga hari berturut-turut setelah pemakaman, keluarga mengadakan tahlilan di rumah duka. Warga desa bergiliran datang untuk mendoakan almarhum dan memberikan dukungan moral kepada keluarga yang ditinggalkan.\r\n\r\n"
                    . "5. **Nyekah (Selamatan)** — Pada hari ke-7, ke-40, ke-100, dan ke-1000 setelah kematian, keluarga mengadakan selamatan dengan menyembelih kambing atau ayam dan membagikan makanan kepada tetangga dan fakir miskin. Acara ini diisi dengan pembacaan doa dan tahlil bersama.\r\n\r\n"
                    . "6. **Bersih Makam (Roah Kubur)** — Setiap tahun menjelang bulan Ramadan, masyarakat secara gotong royong membersihkan makam-makam keluarga dan makam umum. Acara ini diakhiri dengan doa bersama untuk para leluhur.\r\n\r\n"
                    . "Dalam setiap tahapan, terlihat jelas nilai-nilai kekeluargaan, kebersamaan, dan penghormatan kepada yang telah mendahului.",
            ],
            [
                'judul' => 'Gendang Beleq — Musik Tradisional Sumbawa',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[5],
                'deskripsi' => "Gendang Beleq adalah kesenian musik tradisional khas Sumbawa yang menggunakan gendang berukuran besar (beleq berarti besar dalam bahasa Samawa). Kesenian ini telah menjadi ikon budaya Kabupaten Sumbawa dan sering ditampilkan dalam berbagai acara adat dan festival.\r\n\r\n"
                    . "**Instrumen Musik:**\r\n\r\n"
                    . "1. **Gendang Beleq** — Gendang utama berukuran panjang sekitar 120 cm dengan diameter 40 cm. Gendang ini terbuat dari kayu nangka dan kulit sapi atau kerbau. Suaranya yang dalam dan menggema menjadi pengatur tempo utama.\r\n\r\n"
                    . "2. **Gendang Rantasa** — Gendang berukuran sedang yang berfungsi sebagai pengisi ritme.\r\n\r\n"
                    . "3. **Gong (Gong)** — Gong besar yang dipukul pada aksen-aksen tertentu untuk memberikan penekanan.\r\n\r\n"
                    . "4. **Serunai** — Alat tiup bambu yang menghasilkan melodi khas Sumbawa. Suaranya yang nyaring dan melengking memberikan ciri khas pada musik Gendang Beleq.\r\n\r\n"
                    . "5. **Peteq** — Simbal kecil yang dimainkan untuk memberikan variasi ritme.\r\n\r\n"
                    . "6. **Rebana (Terbang)** — Rebana yang dimainkan untuk memperkaya lapisan ritme.\r\n\r\n"
                    . "**Pola Irama:**\r\n"
                    . "Musik Gendang Beleq memiliki beberapa pola irama, yaitu:\r\n"
                    . "- Irama Lambat (Tema) — Digunakan pada awal pertunjukan sebagai pengantar\r\n"
                    . "- Irama Sedang (Kombinasi) — Digunakan untuk mengiringi gerakan tarian Lawang Sakepeng\r\n"
                    . "- Irama Cepat (Lampus) — Irama yang energik dan menghentak, biasanya dimainkan pada bagian akhir dan mengundang penonton untuk bergoyang\r\n\r\n"
                    . "**Fungsi Sosial:**\r\n"
                    . "Gendang Beleq bukan sekadar hiburan, melainkan memiliki fungsi penting dalam kehidupan masyarakat:\r\n"
                    . "- Mengiringi upacara adat seperti Ponan dan Maulid Adat\r\n"
                    . "- Sebagai alat komunikasi tradisional (irama tertentu menandakan peristiwa tertentu)\r\n"
                    . "- Sebagai media hiburan rakyat pada acara-acara desa\r\n"
                    . "- Menjadi identitas budaya yang membanggakan\r\n\r\n"
                    . "Di Desa Poto, grup Gendang Beleq desa aktif berlatih setiap minggu dan sering diundang untuk tampil di acara-acara di luar desa. Grup ini juga rutin mengikuti festival Gendang Beleq tingkat kabupaten yang diadakan setiap tahun.",
            ],
            [
                'judul' => 'Rebo Bontong — Tradisi Rabu Terakhir Safar',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[0],
                'deskripsi' => "Rebo Bontong adalah tradisi masyarakat Sumbawa yang dilaksanakan pada hari Rabu terakhir bulan Safar (kalender Hijriah). Dalam bahasa Samawa, \"Rebo\" berarti Rabu dan \"Bontong\" berarti akhir. Tradisi ini merupakan wujud syukur dan permohonan perlindungan dari marabahaya.\r\n\r\n"
                    . "**Pelaksanaan di Desa Poto:**\r\n\r\n"
                    . "1. **Bersuci (Mandi Safar)** — Sebelum matahari terbit, seluruh warga berbondong-bondong ke pantai atau sumber mata air terdekat untuk mandi bersama. Air mandian telah dicampur dengan bunga tujuh rupa dan daun-daunan tertentu sebagai simbol pembersihan diri dari segala keburukan dan penyakit.\r\n\r\n"
                    . "2. **Menyiapkan Bubur Rebo Bontong** — Warga memasak bubur khas yang disebut \"Bubur Rebo Bontong\" yang terbuat dari beras ketan, santan kelapa, dan gula merah. Bubur ini disajikan dengan taburan kelapa parut dan dimakan bersama-sama dengan keluarga dan tetangga.\r\n\r\n"
                    . "3. **Doa Tolak Bala** — Warga berkumpul di masjid atau balai desa untuk melaksanakan salat sunnah dan doa tolak bala bersama yang dipimpin oleh Kiai. Dalam doa tersebut, masyarakat memohon perlindungan kepada Allah SWT dari segala musibah dan bencana.\r\n\r\n"
                    . "4. **Makan Bajambau** — Acara ditutup dengan makan bersama hidangan yang telah disiapkan secara gotong royong oleh warga.\r\n\r\n"
                    . "**Makna Filosofis:**\r\n"
                    . "Rebo Bontong mengajarkan pentingnya introspeksi diri, menjaga kebersihan (lahir dan batin), serta mempererat tali silaturahmi antarsesama. Tradisi ini juga menjadi pengingat bahwa manusia harus senantiasa bersyukur dan memohon perlindungan kepada Tuhan Yang Maha Esa.\r\n\r\n"
                    . "Meskipun zaman telah berubah, tradisi Rebo Bontong masih dilestarikan oleh masyarakat Desa Poto sebagai warisan budaya yang sarat akan nilai-nilai kebaikan.",
            ],
            [
                'judul' => 'Hukum Adat dan Sanksi Tradisional',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => "Masyarakat Desa Poto masih mengenal dan menerapkan hukum adat sebagai mekanisme pengaturan sosial di samping hukum positif negara. Hukum adat ini berlaku untuk pelanggaran-pelanggaran tertentu yang dianggap mengganggu keseimbangan dan harmoni masyarakat.\r\n\r\n"
                    . "**Jenis Pelanggaran dan Sanksi:**\r\n\r\n"
                    . "1. **Pelanggaran Susila (Zina)** — Pelaku dikenakan sanksi adat berupa denda sejumlah uang, beras, dan kelapa yang ditentukan melalui musyawarah adat. Pelaku juga diwajibkan mengikuti upacara pembersihan adat (Roah) yang dipimpin oleh Ketua Adat.\r\n\r\n"
                    . "2. **Pencurian (Tako)** — Selain diproses secara hukum pidana, pelaku pencurian juga dikenakan sanksi adat berupa pengembalian barang yang dicuri ditambah denda adat sebesar dua kali lipat nilai barang. Pelaku juga diwajibkan membersihkan lingkungan desa sebagai bentuk pemulihan sosial.\r\n\r\n"
                    . "3. **Sengketa Tanah Ulayat** — Diselesaikan melalui musyawarah adat yang dipimpin oleh Tua Loka dengan melibatkan para saksi sejarah dan tokoh masyarakat. Keputusan musyawarah bersifat final dan mengikat.\r\n\r\n"
                    . "4. **Pelanggaran Norma Adat (seperti tidak mengikuti gotong royong)** — Pelaku dikenakan sanksi ringan berupa teguran lisan atau denda kecil berupa beras atau kelapa untuk konsumsi bersama.\r\n\r\n"
                    . "5. **Penghinaan dan Fitnah (Peteq)** — Pelaku diwajibkan meminta maaf secara adat di hadapan Ketua Adat dan kedua belah pihak yang berselisih, serta membayar denda adat.\r\n\r\n"
                    . "**Mekanisme Penyelesaian:**\r\n"
                    . "Penyelesaian sengketa adat dilakukan melalui beberapa tahap:\r\n"
                    . "1. **Musyawarah Tingkat Dusun** — Diselesaikan oleh Kepala Dusun dan tetua adat setempat.\r\n"
                    . "2. **Musyawarah Tingkat Desa** — Jika tidak selesai di tingkat dusun, perkara dibawa ke Tua Loka yang memimpin sidang adat di balai pertemuan desa.\r\n"
                    . "3. **Keputusan Adat** — Setelah mendengar keterangan dari kedua belah pihak dan saksi, Tua Loka bersama perangkat adat lainnya memutuskan sanksi yang harus dijalani.\r\n\r\n"
                    . "Hukum adat di Desa Poto tidak bertentangan dengan hukum positif negara dan lebih mengedepankan aspek restorative justice (keadilan restoratif) yang bertujuan memulihkan hubungan sosial antarwarga.",
            ],
        ];

        foreach ($informasi as $item) {
            InformasiAdat::updateOrCreate(
                ['judul' => $item['judul']],
                collect($item)->only(['kategori', 'deskripsi', 'status', 'gambar'])->toArray()
            );
        }

        $pengurus = [
            [
                'nama' => 'H. Muhammad Saleh, S.Pd.',
                'jabatan' => 'Tua Loka (Ketua Adat)',
                'urutan' => 1,
            ],
            [
                'nama' => 'Ahmad Syarwani',
                'jabatan' => 'Tua Tenga (Wakil Ketua Adat)',
                'urutan' => 2,
            ],
            [
                'nama' => 'M. Junaidi, A.Md.',
                'jabatan' => 'Sekretaris Adat',
                'urutan' => 3,
            ],
            [
                'nama' => 'Siti Maryam',
                'jabatan' => 'Bendahara Adat',
                'urutan' => 4,
            ],
            [
                'nama' => 'TGH. Zainuddin, S.Ag.',
                'jabatan' => 'Kiai (Penasihat Agama)',
                'urutan' => 5,
            ],
            [
                'nama' => 'Mama Inaq Rabi\'ah',
                'jabatan' => 'Sando (Dukun Adat)',
                'urutan' => 6,
            ],
            [
                'nama' => 'M. Arsyad',
                'jabatan' => 'Kepala Dusun Adat Poto',
                'urutan' => 7,
            ],
            [
                'nama' => 'M. Tahir',
                'jabatan' => 'Kepala Dusun Adat Pangguh',
                'urutan' => 8,
            ],
        ];

        foreach ($pengurus as $item) {
            PengurusAdat::updateOrCreate(
                ['nama' => $item['nama']],
                collect($item)->only(['jabatan', 'urutan'])->toArray()
            );
        }

        $kegiatan = [
            [
                'judul' => 'Festival Ponan Tahun ini',
                'tanggal_kegiatan' => now()->addMonth()->format('Y-m-d'),
                'lokasi' => 'Lapangan Serbaguna Desa Poto',
                'status' => 'akan_datang',
                'gambar' => 'kegiatan/keg-1.jpg',
                'deskripsi' => "Festival Ponan tahunan akan dilaksanakan pada tanggal " . now()->addMonth()->translatedFormat('d F Y') . " bertempat di Lapangan Serbaguna Desa Poto. Acara ini merupakan puncak syukuran atas hasil panen raya tahun ini.\r\n\r\n"
                    . "**Rangkaian Acara:**\r\n"
                    . "- Pukul 07.00: Bersih dusun dan persiapan sesajen (Semekat)\r\n"
                    . "- Pukul 09.00: Doa bersama dan upacara adat dipimpin oleh Tua Loka\r\n"
                    . "- Pukul 11.00: Makan Bajambau (makan bersama)\r\n"
                    . "- Pukul 13.00: Pertunjukan Tarian Lawang Sakepeng dan Gendang Beleq\r\n"
                    . "- Pukul 15.00: Lomba-lomba tradisional (panjat pinang, tarik tambang, balap karung)\r\n"
                    . "- Pukul 19.00: Panggung hiburan rakyat dan pembacaan syair adat\r\n\r\n"
                    . "Seluruh warga Desa Poto dan masyarakat sekitar diundang untuk hadir dan meramaikan acara ini.",
            ],
            [
                'judul' => 'Pelatihan Tenun Bateq untuk Pemuda',
                'tanggal_kegiatan' => now()->addWeeks(2)->format('Y-m-d'),
                'lokasi' => 'Balai Pertemuan Desa Poto',
                'status' => 'akan_datang',
                'gambar' => 'kegiatan/keg-2.jpg',
                'deskripsi' => "Kelompok Pengrajin Tenun Bateq Desa Poto bekerja sama dengan Pemerintah Desa akan mengadakan pelatihan menenun bagi pemuda-pemudi desa. Pelatihan ini bertujuan untuk melestarikan warisan budaya tenun ikat khas Sumbawa.\r\n\r\n"
                    . "**Materi Pelatihan:**\r\n"
                    . "- Pengenalan alat tenun tradisional (Gedogan)\r\n"
                    . "- Teknik pewarnaan alami dari dedaunan dan tanah liat\r\n"
                    . "- Praktik menenun motif dasar (Keker, Kait, dan Bunga Cermai)\r\n"
                    . "- Finishing dan perawatan kain tenun\r\n\r\n"
                    . "Pelatihan ini gratis dan terbuka untuk umum. Peserta akan mendapatkan sertifikat dan perlengkapan menenun dasar.",
            ],
            [
                'judul' => 'Gotong Royong Bersih Makam (Roah Kubur)',
                'tanggal_kegiatan' => now()->subMonth()->format('Y-m-d'),
                'lokasi' => 'Area Pemakaman Umum Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-3.jpg',
                'deskripsi' => "Kegiatan bersih makam umum desa dalam rangka menyambut bulan suci Ramadan. Acara ini diikuti oleh seluruh warga dari tiga dusun dan berhasil membersihkan area makam seluas 1,5 hektar.\r\n\r\n"
                    . "**Hasil Kegiatan:**\r\n"
                    . "- Membersihkan rumput liar dan semak belukar di area makam\r\n"
                    . "- Memperbaiki jalan setapak menuju pemakaman\r\n"
                    . "- Pengecatan pagar dan gapura makam\r\n"
                    . "- Doa bersama untuk para leluhur yang dipimpin oleh TGH. Zainuddin, S.Ag.\r\n\r\n"
                    . "Terima kasih kepada seluruh warga yang telah berpartisipasi. Semoga amal ibadah kita diterima oleh Allah SWT.",
            ],
            [
                'judul' => 'Peringatan Maulid Nabi Muhammad SAW',
                'tanggal_kegiatan' => now()->subWeeks(3)->format('Y-m-d'),
                'lokasi' => 'Masjid Nurul Iman dan Lapangan Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-4.jpg',
                'deskripsi' => "Peringatan Maulid Nabi Muhammad SAW tahun ini berlangsung meriah selama tiga hari. Acara dimulai dengan pembacaan Barzanji di Masjid Nurul Iman, dilanjutkan dengan pawai ta'aruf keliling desa, dan puncak acara di Lapangan Desa Poto.\r\n\r\n"
                    . "**Rangkaian Acara:**\r\n"
                    . "- Hari 1: Pembacaan Barzanji dan ceramah agama oleh TGH. Zainuddin\r\n"
                    . "- Hari 2: Pawai ta'aruf keliling desa dan lomba rebana antar-RT\r\n"
                    . "- Hari 3: Puncak acara — penampilan Lawang Sakepeng, Gendang Beleq, dan Makan Bajambau\r\n\r\n"
                    . "Acara berjalan lancar dan dihadiri oleh kurang lebih 1.200 orang dari Desa Poto dan desa-desa tetangga.",
            ],
            [
                'judul' => 'Musyawarah Adat Tahunan',
                'tanggal_kegiatan' => now()->subWeeks(2)->format('Y-m-d'),
                'lokasi' => 'Balai Pertemuan Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-5.jpg',
                'deskripsi' => "Musyawarah adat tahunan yang dihadiri oleh seluruh perangkat lembaga adat, tokoh masyarakat, dan perwakilan warga dari masing-masing dusun. Musyawarah ini membahas beberapa hal penting:\r\n\r\n"
                    . "**Agenda:**\r\n"
                    . "1. Evaluasi kegiatan adat selama satu tahun terakhir\r\n"
                    . "2. Penetapan kalender adat tahun depan (Taun Samawa)\r\n"
                    . "3. Pembahasan sengketa tanah ulayat yang belum terselesaikan\r\n"
                    . "4. Rencana perbaikan fisik balai adat\r\n"
                    . "5. Program regenerasi pengurus adat\r\n\r\n"
                    . "Musyawarah berjalan dengan lancar dan menghasilkan 12 keputusan yang akan dilaksanakan sepanjang tahun depan.",
            ],
        ];

        foreach ($kegiatan as $item) {
            KegiatanAdat::updateOrCreate(
                ['judul' => $item['judul']],
                collect($item)->only(['tanggal_kegiatan', 'lokasi', 'deskripsi', 'status', 'gambar'])->toArray()
            );
        }

        // Galeri — dummy entries linked to kegiatan
        $kegiatanMaulid = KegiatanAdat::where('judul', 'like', '%Maulid%')->first();
        $kegiatanPonan = KegiatanAdat::where('judul', 'like', '%Ponan%')->first();
        $kegiatanRoah = KegiatanAdat::where('judul', 'like', '%Roah%')->first();

        $galeri = [
            ['judul' => 'Pawai Ta\'aruf Maulid', 'gambar' => 'galeri/gal-1.jpg', 'deskripsi' => 'Iring-iringan pawai ta\'aruf keliling desa', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Pembacaan Barzanji', 'gambar' => 'galeri/gal-2.jpg', 'deskripsi' => 'Pembacaan syair Maulid di Masjid Nurul Iman', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Penampilan Gendang Beleq', 'gambar' => 'galeri/gal-3.jpg', 'deskripsi' => 'Grup Gendang Beleq Desa Poto tampil di acara Maulid', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Makan Bajambau Maulid', 'gambar' => 'galeri/gal-4.jpg', 'deskripsi' => 'Makan bersama warga dalam perayaan Maulid', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Persiapan Festival Ponan', 'gambar' => 'galeri/gal-5.jpg', 'deskripsi' => 'Warga menyiapkan sesajen dan hiasan janur', 'tanggal_dokumentasi' => now()->subMonth()->format('Y-m-d'), 'kegiatan_id' => null],
            ['judul' => 'Doa Bersama Ponan', 'gambar' => 'galeri/gal-6.jpg', 'deskripsi' => 'Doa bersama dipimpin oleh Tua Loka', 'tanggal_dokumentasi' => now()->subMonth()->format('Y-m-d'), 'kegiatan_id' => null],
        ];

        foreach ($galeri as $item) {
            Galeri::updateOrCreate(
                ['judul' => $item['judul']],
                collect($item)->only(['gambar', 'deskripsi', 'kegiatan_id', 'tanggal_dokumentasi'])->toArray()
            );
        }
    }
}
