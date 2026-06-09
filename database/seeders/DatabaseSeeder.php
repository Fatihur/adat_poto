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
                'deskripsi' => '<p>Desa Poto merupakan salah satu desa yang terletak di Kecamatan Moyo Hilir, Kabupaten Sumbawa, Provinsi Nusa Tenggara Barat. Desa ini memiliki luas wilayah sekitar 12,5 km² yang terdiri atas beberapa dusun, yakni Dusun Poto, Dusun Pangguh, dan Dusun Karang Dima.</p>'
                    . '<p>Masyarakat Desa Poto mayoritas bersuku Sumbawa (Samawa) dengan mata pencaharian utama sebagai petani, pekebun, dan peternak. Komoditas unggulan desa ini meliputi padi, jagung, kacang tanah, serta hasil hutan seperti kemiri dan bambu.</p>'
                    . '<p>Desa Poto dikenal memiliki kekayaan adat dan budaya yang masih terjaga dengan baik. Berbagai tradisi seperti Ponan (syukuran panen), Besaleq (ritual pengobatan tradisional), Nyorong (lamaran adat), serta kesenian tradisional seperti Bateq (tenun ikat) dan Lawang Sakepeng (tarian adat) masih lestari dan diwariskan secara turun-temurun.</p>'
                    . '<p>Pemerintah desa bersama lembaga adat setempat terus berupaya melestarikan nilai-nilai budaya ini melalui berbagai kegiatan adat tahunan dan dokumentasi digital, sehingga generasi muda dapat mengenal dan menjaga warisan leluhur.</p>',
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
                'deskripsi' => '<p>Ponan adalah upacara adat tahunan masyarakat Sumbawa, termasuk Desa Poto, sebagai wujud syukur kepada Tuhan Yang Maha Esa atas hasil pertanian yang diperoleh. Upacara ini dilaksanakan setelah musim panen raya, biasanya pada bulan April hingga Juni.</p>'
                    . '<p><strong>Tahapan Upacara Ponan:</strong></p>'
                    . '<ol><li><strong>Mita (Musyawarah Awal)</strong> — Para tetua adat dan tokoh masyarakat berkumpul di balai desa untuk menentukan hari baik pelaksanaan Ponan berdasarkan perhitungan kalender adat Sumbawa (Taun Samawa).</li></ol>'
                    . '<ol><li><strong>Bersih Dusun (Roah Gawah)</strong> — Seluruh warga bergotong royong membersihkan lingkungan desa, sumber mata air, dan area sekitar makam leluhur sebagai bentuk penyucian diri dan lingkungan.</li></ol>'
                    . '<ol><li><strong>Menyiapkan Sesajen (Semekat)</strong> — Masyarakat menyiapkan sesajen berupa hasil bumi seperti padi, jagung, pisang, kelapa, ketan, dan ayam panggang. Sesajen ini ditempatkan di atas anyaman bambu (nyiru) yang dihias dengan janur kuning.</li></ol>'
                    . '<ol><li><strong>Doa Bersama (Baca Doa)</strong> — Dipimpin oleh Ketua Adat atau Kiai, seluruh warga berkumpul di lapangan desa atau di bawah pohon besar yang dianggap keramat. Doa dipanjatkan untuk keselamatan dan keberkahan desa, serta penghormatan kepada leluhur.</li></ol>'
                    . '<ol><li><strong>Makan Bersama (Makan Bajambau)</strong> — Setelah doa, seluruh warga makan bersama dengan hidangan yang telah disiapkan. Hidangan khas yang disajikan antara lain sepat (nasi dibungkus daun pisang), ayam talak (ayam masak kuning), jaje urap (kue tradisional), dan tape ketan.</li></ol>'
                    . '<ol><li><strong>Pertunjukan Kesenian</strong> — Acara diakhiri dengan pertunjukan seni tradisional seperti tarian Lawang Sakepeng, silat Samawa, dan gendang beleq. Pada malam harinya, diadakan acara hiburan rakyat seperti pencak silat dan pembacaan syair adat.</li></ol>'
                    . '<p>Nilai filosofis Ponan adalah pengingat bahwa manusia harus selalu bersyukur, menjaga kebersamaan, dan menghormati alam sebagai sumber kehidupan. Hingga saat ini, Ponan masih rutin dilaksanakan setiap tahun oleh masyarakat Desa Poto.</p>',
            ],
            [
                'judul' => 'Adat Perkawinan Sumbawa',
                'kategori' => 'Perkawinan',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => '<p>Perkawinan adat Sumbawa di Desa Poto merupakan rangkaian prosesi yang sarat dengan nilai-nilai kekeluargaan, gotong royong, dan penghormatan kepada leluhur. Prosesi ini terdiri dari beberapa tahapan yang berlangsung selama beberapa hari hingga minggu.</p>'
                    . '<p><strong>Tahapan Perkawinan Adat:</strong></p>'
                    . '<ol><li><strong>Baselo (Pendekatan Awal)</strong> — Keluarga pihak laki-laki mengutus seorang juru bicara (kepala adat atau kerabat terdekat) untuk menyampaikan niat baik kepada keluarga pihak perempuan. Baselo biasanya dilakukan dengan membawa sirih pinang (ngo) sebagai simbol penghormatan.</li></ol>'
                    . '<ol><li><strong>Nyorong (Lamaran Resmi)</strong> — Prosesi lamaran secara resmi dengan membawa barang hantaran berupa uang, kain, perhiasan, dan makanan tradisional. Barang hantaran ini disebut "seserahan" dan jumlahnya telah ditentukan melalui musyawarah sebelumnya. Masyarakat Desa Poto biasanya mengarak barang hantaran ini dari rumah calon mempelai laki-laki ke rumah calon mempelai perempuan dengan iring-iringan keluarga dan tetangga.</li></ol>'
                    . '<ol><li><strong>Mappak Lewo (Akad Nikah)</strong> — Akad nikah dilaksanakan di rumah mempelai perempuan atau di masjid. Prosesi ini dipimpin oleh penghulu dan disaksikan oleh saksi dari kedua belah pihak serta tokoh adat. Mas kawin yang umum di Sumbawa adalah uang logam perak dan seperangkat alat salat.</li></ol>'
                    . '<ol><li><strong>Barapan (Resepsi Resmi)</strong> — Pesta pernikahan yang biasanya digelar secara meriah dengan mengundang seluruh warga desa. Hidangan khas yang disajikan antara lain singang (ikan atau ayam masak kuning berbumbu tamarind), balaput (sate kerang), dan jaje khas Sumbawa.</li></ol>'
                    . '<ol><li><strong>Mano (Tradisi Tiga Hari)</strong> — Setelah resepsi, pengantin baru menjalani tradisi Mano, yaitu tinggal di rumah mempelai perempuan selama tiga hari sebagai bentuk penghormatan dan perkenalan dengan keluarga besar. Pada masa ini, pengantin laki-laki membantu pekerjaan rumah mertua sebagai simbol tanggung jawab.</li></ol>'
                    . '<ol><li><strong>Nundong (Pemberian Nasehat)</strong> — Para tetua adat memberikan nasihat perkawinan kepada kedua mempelai yang dirangkai dalam syair-syair adat berbahasa Samawa. Syair ini berisi petuah tentang bagaimana menjadi suami-istri yang baik, menjaga keharmonisan rumah tangga, serta pentingnya gotong royong dalam kehidupan bermasyarakat.</li></ol>'
                    . '<p>Pakaian adat yang dikenakan adalah kain tenun Bateq khas Sumbawa dengan motif khas seperti motif keker (garis vertikal) dan motif kait (simbol keabadian).</p>',
            ],
            [
                'judul' => 'Tradisi Besaleq — Ritual Pengobatan Tradisional',
                'kategori' => 'Ritual',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[2],
                'deskripsi' => '<p>Besaleq merupakan ritual pengobatan tradisional yang masih dipraktikkan oleh masyarakat Desa Poto dan beberapa desa lain di Sumbawa. Ritual ini bertujuan untuk menyembuhkan penyakit yang diyakini disebabkan oleh gangguan roh halus, santet, atau ketidakseimbangan energi spiritual.</p>'
                    . '<p><strong>Prosesi Besaleq:</strong></p>'
                    . '<ol><li><strong>Pemanggilan Dukun (Sando)</strong> — Ritual dipimpin oleh seorang dukun tradisional yang disebut Sando Besaleq. Sando ini biasanya adalah orang tua yang memiliki pengetahuan tentang mantra-mantra adat, ramuan herbal, serta kemampuan berkomunikasi dengan roh leluhur.</li></ol>'
                    . '<ol><li><strong>Persiapan Banten</strong> — Keluarga pasien menyiapkan sesajen berupa nasi ketan, telur ayam kampung, sirih pinang, kemenyan, kain putih, dan sejumlah uang logam. Semua sesajen ditata di atas wadah bambu yang disebut bokor.</li></ol>'
                    . '<ol><li><strong>Pembacaan Mantra (Baca-baca)</strong> — Sando membacakan mantra-mantra dalam bahasa Samawa kuno sambil membakar kemenyan. Asap kemenyan dipercaya sebagai media penghubung antara manusia dengan roh leluhur dan alam gaib.</li></ol>'
                    . '<ol><li><strong>Pengobatan Herbal</strong> — Selain ritual spiritual, Sando juga memberikan ramuan herbal tradisional yang terbuat dari akar-akaran, daun-daunan, dan rempah-rempah seperti kunyit, jahe, sereh, dan daun sirsak. Ramuan ini diminum atau dioleskan pada bagian tubuh yang sakit.</li></ol>'
                    . '<ol><li><strong>Penyembelihan Ayam</strong> — Ayam kampung disembelih dan darahnya dipercikkan di sekitar rumah pasien sebagai simbol penolak bala. Selanjutnya, ayam tersebut dimasak dan dimakan bersama oleh keluarga.</li></ol>'
                    . '<p>Meskipun akses terhadap layanan kesehatan modern semakin mudah, tradisi Besaleq masih dipertahankan sebagai warisan budaya dan alternatif pengobatan spiritual. Pemerintah desa setempat tidak melarang praktik ini selama tidak menggantikan pengobatan medis untuk penyakit serius.</p>',
            ],
            [
                'judul' => 'Tradisi Bajaga — Jaga Desa dan Malam Berjaga',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[3],
                'deskripsi' => '<p>Bajaga adalah tradisi jaga malam yang dilakukan secara bergiliran oleh warga Desa Poto. Tradisi ini bukan sekadar kegiatan ronda biasa, melainkan sudah mengakar sebagai bentuk kewajiban adat setiap warga laki-laki dewasa yang sudah menikah.</p>'
                    . '<p><strong>Sistem Pelaksanaan:</strong></p>'
                    . '<p>Setiap malam, empat hingga enam orang laki-laki dari masing-masing dusun secara bergiliran melaksanakan Bajaga di pos jaga (poskamling) yang tersebar di beberapa titik strategis desa. Mereka membawa kentongan (teteak) yang terbuat dari bambu atau kayu sebagai alat komunikasi tradisional.</p>'
                    . '<p><strong>Kode Kentongan:</strong></p>'
                    . '<ul><li>Pukulan cepat dan rapat: tanda bahaya (kebakaran, pencurian, atau bencana alam)</li></ul>'
                    . '<ul><li>Pukulan lambat tiga kali: suasana aman dan kondusif</li></ul>'
                    . '<ul><li>Pukulan satu kali panjang: pergantian shift jaga</li></ul>'
                    . '<p><strong>Nilai Budaya:</strong></p>'
                    . '<p>Bajaga mengajarkan nilai-nilai gotong royong, tanggung jawab sosial, serta kepedulian terhadap sesama. Warga yang tidak melaksanakan kewajiban Bajaga tanpa alasan yang sah akan dikenakan sanksi adat berupa teguran lisan hingga denda berupa beras atau kelapa untuk konsumsi bersama.</p>'
                    . '<p>Di era modern, tradisi Bajaga tetap berjalan beriringan dengan sistem keamanan lingkungan binaan (Satlinmas) yang difasilitasi oleh pemerintah desa. Kentongan masih digunakan sebagai alat komunikasi tradisional yang berdampingan dengan pengeras suara masjid dan grup WhatsApp desa.</p>',
            ],
            [
                'judul' => 'Adat Kelahiran — Upacara Menyambut Bayi',
                'kategori' => 'Upacara Adat',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[4],
                'deskripsi' => '<p>Masyarakat Desa Poto memiliki serangkaian upacara adat yang berkaitan dengan kelahiran bayi. Upacara ini bertujuan untuk memberikan perlindungan spiritual kepada bayi dan ibu, serta memperkenalkan anggota baru kepada masyarakat.</p>'
                    . '<p><strong>Rangkaian Upacara:</strong></p>'
                    . '<ol><li><strong>Robo (Potong Tali Pusar)</strong> — Dilakukan oleh dukun beranak (Sando Beranak) atau bidan desa. Tali pusar yang telah dipotong dikuburkan di halaman rumah bersama dengan rempah-rempah sebagai simbol harapan agar bayi tumbuh sehat dan kuat.</li></ol>'
                    . '<ol><li><strong>Nanya Oi (Mandi Bayi Pertama)</strong> — Bayi dimandikan dengan air yang dicampur bunga-bunga dan daun-daunan tertentu seperti daun kemangi, daun pandan, dan bunga mawar. Air mandian ini dipercaya dapat membersihkan aura negatif dan memberikan energi positif.</li></ol>'
                    . '<ol><li><strong>Ngendo (Aqiqah)</strong> — Upacara aqiqah dilaksanakan pada hari ketujuh setelah kelahiran. Kambing disembelih (dua ekor untuk bayi laki-laki, satu ekor untuk bayi perempuan) dan dagingnya dimasak serta dibagikan kepada tetangga, kerabat, dan fakir miskin.</li></ol>'
                    . '<ol><li><strong>Pemberian Nama (Mappak Nga)</strong> — Nama bayi biasanya diberikan oleh Ketua Adat atau Kiai desa. Pemberian nama diawali dengan pembacaan doa dan azan di telinga kanan bayi serta iqamat di telinga kiri.</li></ol>'
                    . '<ol><li><strong>Notong (Pukul Tujuh Hari)</strong> — Pada hari ketujuh, keluarga mengadakan syukuran kecil dengan mengundang tetangga terdekat. Hidangan khas yang disajikan adalah bubur merah putih (bubur sumsum) dan telur rebus yang dicelupkan ke dalam pewarna alami.</li></ol>'
                    . '<p>Dalam setiap tahapan, nilai-nilai islami dan adat berpadu secara harmonis, mencerminkan sinkretisme budaya yang khas di Sumbawa.</p>',
            ],
            [
                'judul' => 'Tradisi Maulid Adat Samawa',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[5],
                'deskripsi' => '<p>Maulid Adat Samawa merupakan perayaan Maulid Nabi Muhammad SAW yang dirayakan dengan memadukan unsur keagamaan dan adat istiadat Sumbawa. Di Desa Poto, perayaan ini berlangsung selama tiga hari tiga malam dan melibatkan seluruh lapisan masyarakat.</p>'
                    . '<p><strong>Rangkaian Acara:</strong></p>'
                    . '<ol><li><strong>Barzanji (Pembacaan Syair Maulid)</strong> — Berlangsung di masjid atau langgar desa. Syair Barzanji dibacakan secara bergantian oleh para pemuda desa dengan irama khas Sumbawa. Suasana semakin khidmat dengan tabuhan rebana (terbang) yang mengiringi setiap bait syair.</li></ol>'
                    . '<ol><li><strong>Pawai Ta\'aruf (Arak-arakan)</strong> — Pada hari kedua, diadakan pawai keliling desa yang diikuti oleh anak-anak, remaja, dan orang dewasa. Peserta pawai membawa berbagai macam hiasan seperti janur, bendera, dan replika masjid yang terbuat dari bahan-bahan alami. Pawai diiringi dengan tabuhan gendang beleq dan rebana.</li></ol>'
                    . '<ol><li><strong>Maulid Adat</strong> — Acara puncak digelar di lapangan desa dengan menampilkan berbagai kesenian tradisional seperti:</li></ol>'
                    . '<ul><li>Tarian Lawang Sakepeng (tarian selamat datang)</li></ul>'
                    . '<ul><li>Gendang Beleq (kesenian musik tradisional dengan gendang besar)</li></ul>'
                    . '<ul><li>Silat Samawa (pencak silat khas Sumbawa)</li></ul>'
                    . '<ul><li>Pembacaan syair Maulid dalam bahasa Samawa</li></ul>'
                    . '<ol><li><strong>Makan Bajambau</strong> — Seluruh warga menikmati hidangan yang telah disiapkan secara gotong royong. Hidangan utama adalah nasi jajan (nasi kuning dengan lauk pauk) yang dihidangkan di atas anyaman bambu panjang (lesehan), sebagai simbol kebersamaan dan persaudaraan.</li></ol>'
                    . '<p>Perayaan Maulid Adat Samawa merupakan momentum memperkuat silaturahmi antarmasyarakat dan menjadi ajang pelestarian seni budaya tradisional yang terus dijaga oleh generasi muda Desa Poto.</p>',
            ],
            [
                'judul' => 'Kain Tenun Bateq Sumbawa',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[0],
                'deskripsi' => '<p>Bateq adalah kain tenun tradisional khas Sumbawa yang telah ada sejak abad ke-16. Kain ini ditenun dengan alat tenun tradisional yang disebut Gedogan dan menggunakan benang katun atau benang sutra yang diwarnai dengan pewarna alami.</p>'
                    . '<p><strong>Motif dan Makna:</strong></p>'
                    . '<ol><li><strong>Motif Keker</strong> — Berbentuk garis-garis vertikal yang melambangkan kekokohan dan keteguhan pendirian. Motif ini biasanya digunakan oleh tetua adat dan pemimpin masyarakat.</li></ol>'
                    . '<ol><li><strong>Motif Kait</strong> — Berbentuk anyaman kait yang melambangkan keberlanjutan kehidupan dan hubungan erat antara manusia dengan alam semesta.</li></ol>'
                    . '<ol><li><strong>Motif Bunga Cermai</strong> — Berbentuk bunga cermai yang melambangkan keindahan, kelembutan, dan kesuburan. Motif ini sering digunakan untuk pakaian pengantin atau busana upacara adat.</li></ol>'
                    . '<ol><li><strong>Motif Tampak</strong> — Motif segitiga yang melambangkan keharmonisan hubungan antar sesama manusia dan dengan Tuhan Yang Maha Esa.</li></ol>'
                    . '<p><strong>Proses Pembuatan:</strong></p>'
                    . '<p>Proses menenun Bateq memakan waktu antara dua minggu hingga dua bulan tergantung kerumitan motif. Tahapannya meliputi:</p>'
                    . '<ul><li>Pemintalan benang (menggunakan kapas lokal)</li></ul>'
                    . '<ul><li>Pewarnaan alami (dari daun indigo, kunyit, kulit kayu tingi, dan tanah liat)</li></ul>'
                    . '<ul><li>Penenunan dengan alat Gedogan</li></ul>'
                    . '<ul><li>Finishing (pengeringan dan penghalusan)</li></ul>'
                    . '<p><strong>Pelestarian:</strong></p>'
                    . '<p>Di Desa Poto, tradisi menenun Bateq masih diajarkan secara turun-temurun oleh ibu-ibu dan remaja putri. Kelompok pengrajin tenun Bateq di desa ini telah terbentuk dan rutin mengikuti pameran kerajinan di tingkat kabupaten dan provinsi. Pemerintah daerah juga mendukung pelestarian Bateq melalui program pelatihan dan bantuan peralatan tenun.</p>',
            ],
            [
                'judul' => 'Tarian Lawang Sakepeng',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => '<p>Lawang Sakepeng adalah tarian tradisional khas Sumbawa yang berasal dari kata "lawang" (pintu) dan "sakepeng" (satu kepeng/uang logam). Tarian ini melambangkan keterbukaan dan keramahan masyarakat Sumbawa dalam menyambut tamu.</p>'
                    . '<p><strong>Sejarah dan Filosofi:</strong></p>'
                    . '<p>Lawang Sakepeng diciptakan pada masa Kesultanan Sumbawa sebagai tari penyambutan bagi tamu-tamu kerajaan. Uang logam (kepeng) yang menjadi properti utama tarian melambangkan kemakmuran dan kesejahteraan. Ketika pintu dibuka (lawang dibuka) dan uang logam diberikan (sakepeng), itu berarti tuan rumah memberikan penghormatan yang tulus kepada tamu.</p>'
                    . '<p><strong>Gerakan dan Properti:</strong></p>'
                    . '<p>Tarian ini dibawakan oleh 4 hingga 8 orang penari putri dengan gerakan yang gemulai namun penuh makna. Properti yang digunakan berupa:</p>'
                    . '<ul><li>Bokor (wadah kuningan) berisi uang logam kepeng</li></ul>'
                    . '<ul><li>Selendang sutra warna kuning (simbol keagungan)</li></ul>'
                    . '<ul><li>Kipas tradisional dari bambu dan kain</li></ul>'
                    . '<p>Gerakan tarian terbagi menjadi tiga bagian:</p>'
                    . '<ol><li><strong>Bagian Pembuka</strong> — Penari memasuki arena dengan gerakan berjalan perlahan sambil menghormat kepada penonton.</li></ol>'
                    . '<ol><li><strong>Bagian Inti</strong> — Penari membagikan uang kepeng kepada penonton sebagai simbol pemberian berkah dan rezeki.</li></ol>'
                    . '<ol><li><strong>Bagian Penutup</strong> — Penari meninggalkan arena dengan gerakan mundur sebagai simbol penghormatan.</li></ol>'
                    . '<p><strong>Iringan Musik:</strong></p>'
                    . '<p>Tarian Lawang Sakepeng diiringi oleh musik tradisional yang terdiri dari gendang, gong, serunai (alat tiup bambu), dan rebana. Irama yang dimainkan adalah irama gendang beleq yang rancak dan bersemangat.</p>'
                    . '<p>Di Desa Poto, Tarian Lawang Sakepeng rutin ditampilkan pada acara-acara adat, penyambutan tamu penting, dan festival budaya. Sanggar tari desa yang dikelola oleh pemuda-pemudi desa aktif melatih generasi muda untuk melestarikan tarian ini.</p>',
            ],
            [
                'judul' => 'Sistem Pemerintahan Adat Desa Poto',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[2],
                'deskripsi' => '<p>Pemerintahan adat di Desa Poto merupakan sistem kelembagaan tradisional yang telah ada jauh sebelum terbentuknya struktur pemerintahan desa modern. Lembaga adat ini tetap eksis dan berperan penting dalam menjaga tatanan sosial masyarakat.</p>'
                    . '<p><strong>Struktur Lembaga Adat:</strong></p>'
                    . '<ol><li><strong>Tua Loka (Ketua Adat)</strong> — Pemimpin tertinggi adat yang bertugas memimpin seluruh kegiatan adat dan menjadi penengah dalam penyelesaian sengketa adat. Tua Loka dipilih berdasarkan garis keturunan dan kearifan yang dimiliki. Masa jabatan berlangsung seumur hidup.</li></ol>'
                    . '<ol><li><strong>Tua Tenga (Wakil Ketua Adat)</strong> — Membantu Tua Loka dalam pelaksanaan kegiatan adat dan menggantikannya apabila berhalangan hadir.</li></ol>'
                    . '<ol><li><strong>Sekretaris Adat</strong> — Mengelola administrasi dan dokumentasi kegiatan adat, termasuk pencatatan silsilah keluarga, peristiwa adat, dan keputusan-keputusan penting lembaga adat.</li></ol>'
                    . '<ol><li><strong>Bendahara Adat</strong> — Bertanggung jawab mengelola keuangan dan aset adat, termasuk tanah ulayat, hasil bumi dari tanah adat, serta sumbangan sukarela masyarakat.</li></ol>'
                    . '<ol><li><strong>Kiai (Penasihat Agama)</strong> — Memberikan nasihat terkait aspek keagamaan dalam setiap kegiatan adat. Keberadaan Kiai memastikan bahwa setiap tradisi adat tidak bertentangan dengan ajaran Islam.</li></ol>'
                    . '<ol><li><strong>Sando (Dukun Adat)</strong> — Ahli pengobatan tradisional dan spiritual yang berperan dalam ritual-ritual adat seperti Besaleq dan upacara kelahiran.</li></ol>'
                    . '<ol><li><strong>Kepala Dusun Adat</strong> — Perwakilan lembaga adat di masing-masing dusun yang menjembatani komunikasi antara masyarakat dan Tua Loka.</li></ol>'
                    . '<p><strong>Fungsi Lembaga Adat:</strong></p>'
                    . '<ul><li>Menetapkan kalender adat (Taun Samawa) untuk menentukan hari baik pelaksanaan kegiatan</li></ul>'
                    . '<ul><li>Mengadili sengketa adat seperti sengketa tanah, perkawinan, dan pelanggaran norma adat</li></ul>'
                    . '<ul><li>Mengelola tanah ulayat dan hutan adat</li></ul>'
                    . '<ul><li>Menyelenggarakan upacara adat tahunan</li></ul>'
                    . '<ul><li>Memberikan saran dan pertimbangan kepada pemerintah desa dalam pengambilan keputusan yang berkaitan dengan budaya dan tradisi</li></ul>'
                    . '<p>Lembaga adat Desa Poto saat ini terus beradaptasi dengan perkembangan zaman tanpa meninggalkan nilai-nilai luhur yang telah diwariskan oleh leluhur.</p>',
            ],
            [
                'judul' => 'Tradisi Lako — Gotong Royong ala Sumbawa',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[3],
                'deskripsi' => '<p>Lako adalah tradisi gotong royong khas masyarakat Sumbawa yang sudah mengakar kuat di Desa Poto. Berbeda dengan gotong royong pada umumnya, Lako memiliki aturan dan tata cara yang diatur oleh adat.</p>'
                    . '<p><strong>Bentuk-bentuk Lako:</strong></p>'
                    . '<ol><li><strong>Lako Nguma</strong> — Gotong royong membantu warga yang akan menempati rumah baru. Warga secara sukarela membantu membersihkan, mengecat, dan mengatur perabotan rumah. Sebagai imbalan, tuan rumah menyediakan hidangan sederhana berupa kopi dan jaje tradisional.</li></ol>'
                    . '<ol><li><strong>Lako Uma</strong> — Gotong royong di sawah atau ladang milik warga, terutama saat musim tanam dan musim panen. Sekelompok warga secara bergiliran membantu mengerjakan lahan anggota kelompok lainnya. Sistem ini efisien dan mempererat hubungan antarwarga.</li></ol>'
                    . '<ol><li><strong>Lako Nikah</strong> — Gotong royong dalam mempersiapkan acara pernikahan. Warga membantu mendirikan tenda, menyiapkan hidangan, membersihkan lingkungan, dan melayani tamu. Tuan rumah cukup menyediakan bahan makanan dan minuman.</li></ol>'
                    . '<ol><li><strong>Lako Kematian</strong> — Gotong royong saat ada warga yang meninggal dunia. Warga secara spontan membantu mempersiapkan pemakaman, menggali kubur, memandikan jenazah, menyiapkan konsumsi, dan mengurus surat-surat kematian. Lako Kematian merupakan salah satu tradisi yang paling kuat dipegang oleh masyarakat.</li></ol>'
                    . '<ol><li><strong>Lako Bala</strong> — Gotong royong saat terjadi bencana alam seperti banjir, longsor, atau kebakaran. Warga secara sigap bahu-membahu mengevakuasi korban, membersihkan puing-puing, dan membangun kembali rumah yang rusak.</li></ol>'
                    . '<p><strong>Sistem Pencatatan Lako:</strong></p>'
                    . '<p>Setiap kepala keluarga diwajibkan untuk berpartisipasi dalam kegiatan Lako. Partisipasi dicatat oleh Ketua RT atau Kepala Dusun. Warga yang tidak hadir tanpa alasan sah akan dicatat sebagai "hutang Lako" yang harus dibayar pada kesempatan berikutnya.</p>'
                    . '<p>Nilai filosofis Lako adalah pengingat bahwa manusia tidak dapat hidup sendiri dan harus saling membantu. Tradisi ini menjadi perekat sosial yang sangat kuat di masyarakat Desa Poto hingga saat ini.</p>',
            ],
            [
                'judul' => 'Upacara Adat Kematian',
                'kategori' => 'Upacara Adat',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[4],
                'deskripsi' => '<p>Upacara adat kematian di Desa Poto merupakan rangkaian prosesi yang memadukan syariat Islam dengan tradisi lokal. Masyarakat meyakini bahwa kematian bukanlah akhir, melainkan perpindahan menuju kehidupan abadi di akhirat.</p>'
                    . '<p><strong>Tahapan Upacara:</strong></p>'
                    . '<ol><li><strong>Melepas (Memandikan Jenazah)</strong> — Jenazah dimandikan oleh keluarga terdekat yang dipandu oleh Kiai atau tokoh agama. Air mandian dicampur dengan kapur barus dan daun bidara sebagai simbol penyucian. Kain kafan yang digunakan biasanya merupakan kain tenun Bateq polos berwarna putih.</li></ol>'
                    . '<ol><li><strong>Menyembahyangkan</strong> — Salat jenazah dilaksanakan di masjid atau langgar desa dengan diimami oleh Kiai. Seluruh warga desa diundang untuk ikut menyembahyangkan.</li></ol>'
                    . '<ol><li><strong>Ngendo (Pemakaman)</strong> — Jenazah diusung ke pemakaman umum desa dengan iring-iringan warga yang berjalan kaki. Sepanjang perjalanan, warga membaca kalimat thayyibah. Di area pemakaman, jenazah dimakamkan dengan menghadap kiblat dan batu nisan diletakkan di atas makam.</li></ol>'
                    . '<ol><li><strong>Tahlilan (Tiga Hari)</strong> — Selama tiga hari berturut-turut setelah pemakaman, keluarga mengadakan tahlilan di rumah duka. Warga desa bergiliran datang untuk mendoakan almarhum dan memberikan dukungan moral kepada keluarga yang ditinggalkan.</li></ol>'
                    . '<ol><li><strong>Nyekah (Selamatan)</strong> — Pada hari ke-7, ke-40, ke-100, dan ke-1000 setelah kematian, keluarga mengadakan selamatan dengan menyembelih kambing atau ayam dan membagikan makanan kepada tetangga dan fakir miskin. Acara ini diisi dengan pembacaan doa dan tahlil bersama.</li></ol>'
                    . '<ol><li><strong>Bersih Makam (Roah Kubur)</strong> — Setiap tahun menjelang bulan Ramadan, masyarakat secara gotong royong membersihkan makam-makam keluarga dan makam umum. Acara ini diakhiri dengan doa bersama untuk para leluhur.</li></ol>'
                    . '<p>Dalam setiap tahapan, terlihat jelas nilai-nilai kekeluargaan, kebersamaan, dan penghormatan kepada yang telah mendahului.</p>',
            ],
            [
                'judul' => 'Gendang Beleq — Musik Tradisional Sumbawa',
                'kategori' => 'Kesenian',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[5],
                'deskripsi' => '<p>Gendang Beleq adalah kesenian musik tradisional khas Sumbawa yang menggunakan gendang berukuran besar (beleq berarti besar dalam bahasa Samawa). Kesenian ini telah menjadi ikon budaya Kabupaten Sumbawa dan sering ditampilkan dalam berbagai acara adat dan festival.</p>'
                    . '<p><strong>Instrumen Musik:</strong></p>'
                    . '<ol><li><strong>Gendang Beleq</strong> — Gendang utama berukuran panjang sekitar 120 cm dengan diameter 40 cm. Gendang ini terbuat dari kayu nangka dan kulit sapi atau kerbau. Suaranya yang dalam dan menggema menjadi pengatur tempo utama.</li></ol>'
                    . '<ol><li><strong>Gendang Rantasa</strong> — Gendang berukuran sedang yang berfungsi sebagai pengisi ritme.</li></ol>'
                    . '<ol><li><strong>Gong (Gong)</strong> — Gong besar yang dipukul pada aksen-aksen tertentu untuk memberikan penekanan.</li></ol>'
                    . '<ol><li><strong>Serunai</strong> — Alat tiup bambu yang menghasilkan melodi khas Sumbawa. Suaranya yang nyaring dan melengking memberikan ciri khas pada musik Gendang Beleq.</li></ol>'
                    . '<ol><li><strong>Peteq</strong> — Simbal kecil yang dimainkan untuk memberikan variasi ritme.</li></ol>'
                    . '<ol><li><strong>Rebana (Terbang)</strong> — Rebana yang dimainkan untuk memperkaya lapisan ritme.</li></ol>'
                    . '<p><strong>Pola Irama:</strong></p>'
                    . '<p>Musik Gendang Beleq memiliki beberapa pola irama, yaitu:</p>'
                    . '<ul><li>Irama Lambat (Tema) — Digunakan pada awal pertunjukan sebagai pengantar</li></ul>'
                    . '<ul><li>Irama Sedang (Kombinasi) — Digunakan untuk mengiringi gerakan tarian Lawang Sakepeng</li></ul>'
                    . '<ul><li>Irama Cepat (Lampus) — Irama yang energik dan menghentak, biasanya dimainkan pada bagian akhir dan mengundang penonton untuk bergoyang</li></ul>'
                    . '<p><strong>Fungsi Sosial:</strong></p>'
                    . '<p>Gendang Beleq bukan sekadar hiburan, melainkan memiliki fungsi penting dalam kehidupan masyarakat:</p>'
                    . '<ul><li>Mengiringi upacara adat seperti Ponan dan Maulid Adat</li></ul>'
                    . '<ul><li>Sebagai alat komunikasi tradisional (irama tertentu menandakan peristiwa tertentu)</li></ul>'
                    . '<ul><li>Sebagai media hiburan rakyat pada acara-acara desa</li></ul>'
                    . '<ul><li>Menjadi identitas budaya yang membanggakan</li></ul>'
                    . '<p>Di Desa Poto, grup Gendang Beleq desa aktif berlatih setiap minggu dan sering diundang untuk tampil di acara-acara di luar desa. Grup ini juga rutin mengikuti festival Gendang Beleq tingkat kabupaten yang diadakan setiap tahun.</p>',
            ],
            [
                'judul' => 'Rebo Bontong — Tradisi Rabu Terakhir Safar',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[0],
                'deskripsi' => '<p>Rebo Bontong adalah tradisi masyarakat Sumbawa yang dilaksanakan pada hari Rabu terakhir bulan Safar (kalender Hijriah). Dalam bahasa Samawa, "Rebo" berarti Rabu dan "Bontong" berarti akhir. Tradisi ini merupakan wujud syukur dan permohonan perlindungan dari marabahaya.</p>'
                    . '<p><strong>Pelaksanaan di Desa Poto:</strong></p>'
                    . '<ol><li><strong>Bersuci (Mandi Safar)</strong> — Sebelum matahari terbit, seluruh warga berbondong-bondong ke pantai atau sumber mata air terdekat untuk mandi bersama. Air mandian telah dicampur dengan bunga tujuh rupa dan daun-daunan tertentu sebagai simbol pembersihan diri dari segala keburukan dan penyakit.</li></ol>'
                    . '<ol><li><strong>Menyiapkan Bubur Rebo Bontong</strong> — Warga memasak bubur khas yang disebut "Bubur Rebo Bontong" yang terbuat dari beras ketan, santan kelapa, dan gula merah. Bubur ini disajikan dengan taburan kelapa parut dan dimakan bersama-sama dengan keluarga dan tetangga.</li></ol>'
                    . '<ol><li><strong>Doa Tolak Bala</strong> — Warga berkumpul di masjid atau balai desa untuk melaksanakan salat sunnah dan doa tolak bala bersama yang dipimpin oleh Kiai. Dalam doa tersebut, masyarakat memohon perlindungan kepada Allah SWT dari segala musibah dan bencana.</li></ol>'
                    . '<ol><li><strong>Makan Bajambau</strong> — Acara ditutup dengan makan bersama hidangan yang telah disiapkan secara gotong royong oleh warga.</li></ol>'
                    . '<p><strong>Makna Filosofis:</strong></p>'
                    . '<p>Rebo Bontong mengajarkan pentingnya introspeksi diri, menjaga kebersihan (lahir dan batin), serta mempererat tali silaturahmi antarsesama. Tradisi ini juga menjadi pengingat bahwa manusia harus senantiasa bersyukur dan memohon perlindungan kepada Tuhan Yang Maha Esa.</p>'
                    . '<p>Meskipun zaman telah berubah, tradisi Rebo Bontong masih dilestarikan oleh masyarakat Desa Poto sebagai warisan budaya yang sarat akan nilai-nilai kebaikan.</p>',
            ],
            [
                'judul' => 'Hukum Adat dan Sanksi Tradisional',
                'kategori' => 'Tradisi',
                'status' => 'terbit',
                'gambar' => $gambarInformasi[1],
                'deskripsi' => '<p>Masyarakat Desa Poto masih mengenal dan menerapkan hukum adat sebagai mekanisme pengaturan sosial di samping hukum positif negara. Hukum adat ini berlaku untuk pelanggaran-pelanggaran tertentu yang dianggap mengganggu keseimbangan dan harmoni masyarakat.</p>'
                    . '<p><strong>Jenis Pelanggaran dan Sanksi:</strong></p>'
                    . '<ol><li><strong>Pelanggaran Susila (Zina)</strong> — Pelaku dikenakan sanksi adat berupa denda sejumlah uang, beras, dan kelapa yang ditentukan melalui musyawarah adat. Pelaku juga diwajibkan mengikuti upacara pembersihan adat (Roah) yang dipimpin oleh Ketua Adat.</li></ol>'
                    . '<ol><li><strong>Pencurian (Tako)</strong> — Selain diproses secara hukum pidana, pelaku pencurian juga dikenakan sanksi adat berupa pengembalian barang yang dicuri ditambah denda adat sebesar dua kali lipat nilai barang. Pelaku juga diwajibkan membersihkan lingkungan desa sebagai bentuk pemulihan sosial.</li></ol>'
                    . '<ol><li><strong>Sengketa Tanah Ulayat</strong> — Diselesaikan melalui musyawarah adat yang dipimpin oleh Tua Loka dengan melibatkan para saksi sejarah dan tokoh masyarakat. Keputusan musyawarah bersifat final dan mengikat.</li></ol>'
                    . '<ol><li><strong>Pelanggaran Norma Adat (seperti tidak mengikuti gotong royong)</strong> — Pelaku dikenakan sanksi ringan berupa teguran lisan atau denda kecil berupa beras atau kelapa untuk konsumsi bersama.</li></ol>'
                    . '<ol><li><strong>Penghinaan dan Fitnah (Peteq)</strong> — Pelaku diwajibkan meminta maaf secara adat di hadapan Ketua Adat dan kedua belah pihak yang berselisih, serta membayar denda adat.</li></ol>'
                    . '<p><strong>Mekanisme Penyelesaian:</strong></p>'
                    . '<p>Penyelesaian sengketa adat dilakukan melalui beberapa tahap:</p>'
                    . '<ol><li><strong>Musyawarah Tingkat Dusun</strong> — Diselesaikan oleh Kepala Dusun dan tetua adat setempat.</li></ol>'
                    . '<ol><li><strong>Musyawarah Tingkat Desa</strong> — Jika tidak selesai di tingkat dusun, perkara dibawa ke Tua Loka yang memimpin sidang adat di balai pertemuan desa.</li></ol>'
                    . '<ol><li><strong>Keputusan Adat</strong> — Setelah mendengar keterangan dari kedua belah pihak dan saksi, Tua Loka bersama perangkat adat lainnya memutuskan sanksi yang harus dijalani.</li></ol>'
                    . '<p>Hukum adat di Desa Poto tidak bertentangan dengan hukum positif negara dan lebih mengedepankan aspek restorative justice (keadilan restoratif) yang bertujuan memulihkan hubungan sosial antarwarga.</p>',
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
                'deskripsi' => '<p>Festival Ponan tahunan akan dilaksanakan pada tanggal</p>' . now()->addMonth()->translatedFormat('d F Y') . '<p>bertempat di Lapangan Serbaguna Desa Poto. Acara ini merupakan puncak syukuran atas hasil panen raya tahun ini.</p>'
                    . '<p><strong>Rangkaian Acara:</strong></p>'
                    . '<ul><li>Pukul 07.00: Bersih dusun dan persiapan sesajen (Semekat)</li></ul>'
                    . '<ul><li>Pukul 09.00: Doa bersama dan upacara adat dipimpin oleh Tua Loka</li></ul>'
                    . '<ul><li>Pukul 11.00: Makan Bajambau (makan bersama)</li></ul>'
                    . '<ul><li>Pukul 13.00: Pertunjukan Tarian Lawang Sakepeng dan Gendang Beleq</li></ul>'
                    . '<ul><li>Pukul 15.00: Lomba-lomba tradisional (panjat pinang, tarik tambang, balap karung)</li></ul>'
                    . '<ul><li>Pukul 19.00: Panggung hiburan rakyat dan pembacaan syair adat</li></ul>'
                    . '<p>Seluruh warga Desa Poto dan masyarakat sekitar diundang untuk hadir dan meramaikan acara ini.</p>',
            ],
            [
                'judul' => 'Pelatihan Tenun Bateq untuk Pemuda',
                'tanggal_kegiatan' => now()->addWeeks(2)->format('Y-m-d'),
                'lokasi' => 'Balai Pertemuan Desa Poto',
                'status' => 'akan_datang',
                'gambar' => 'kegiatan/keg-2.jpg',
                'deskripsi' => '<p>Kelompok Pengrajin Tenun Bateq Desa Poto bekerja sama dengan Pemerintah Desa akan mengadakan pelatihan menenun bagi pemuda-pemudi desa. Pelatihan ini bertujuan untuk melestarikan warisan budaya tenun ikat khas Sumbawa.</p>'
                    . '<p><strong>Materi Pelatihan:</strong></p>'
                    . '<ul><li>Pengenalan alat tenun tradisional (Gedogan)</li></ul>'
                    . '<ul><li>Teknik pewarnaan alami dari dedaunan dan tanah liat</li></ul>'
                    . '<ul><li>Praktik menenun motif dasar (Keker, Kait, dan Bunga Cermai)</li></ul>'
                    . '<ul><li>Finishing dan perawatan kain tenun</li></ul>'
                    . '<p>Pelatihan ini gratis dan terbuka untuk umum. Peserta akan mendapatkan sertifikat dan perlengkapan menenun dasar.</p>',
            ],
            [
                'judul' => 'Gotong Royong Bersih Makam (Roah Kubur)',
                'tanggal_kegiatan' => now()->subMonth()->format('Y-m-d'),
                'lokasi' => 'Area Pemakaman Umum Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-3.jpg',
                'deskripsi' => '<p>Kegiatan bersih makam umum desa dalam rangka menyambut bulan suci Ramadan. Acara ini diikuti oleh seluruh warga dari tiga dusun dan berhasil membersihkan area makam seluas 1,5 hektar.</p>'
                    . '<p><strong>Hasil Kegiatan:</strong></p>'
                    . '<ul><li>Membersihkan rumput liar dan semak belukar di area makam</li></ul>'
                    . '<ul><li>Memperbaiki jalan setapak menuju pemakaman</li></ul>'
                    . '<ul><li>Pengecatan pagar dan gapura makam</li></ul>'
                    . '<ul><li>Doa bersama untuk para leluhur yang dipimpin oleh TGH. Zainuddin, S.Ag.</li></ul>'
                    . '<p>Terima kasih kepada seluruh warga yang telah berpartisipasi. Semoga amal ibadah kita diterima oleh Allah SWT.</p>',
            ],
            [
                'judul' => 'Peringatan Maulid Nabi Muhammad SAW',
                'tanggal_kegiatan' => now()->subWeeks(3)->format('Y-m-d'),
                'lokasi' => 'Masjid Nurul Iman dan Lapangan Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-4.jpg',
                'deskripsi' => '<p>Peringatan Maulid Nabi Muhammad SAW tahun ini berlangsung meriah selama tiga hari. Acara dimulai dengan pembacaan Barzanji di Masjid Nurul Iman, dilanjutkan dengan pawai ta\'aruf keliling desa, dan puncak acara di Lapangan Desa Poto.</p>'
                    . '<p><strong>Rangkaian Acara:</strong></p>'
                    . '<ul><li>Hari 1: Pembacaan Barzanji dan ceramah agama oleh TGH. Zainuddin</li></ul>'
                    . '<ul><li>Hari 2: Pawai ta\'aruf keliling desa dan lomba rebana antar-RT</li></ul>'
                    . '<ul><li>Hari 3: Puncak acara — penampilan Lawang Sakepeng, Gendang Beleq, dan Makan Bajambau</li></ul>'
                    . '<p>Acara berjalan lancar dan dihadiri oleh kurang lebih 1.200 orang dari Desa Poto dan desa-desa tetangga.</p>',
            ],
            [
                'judul' => 'Musyawarah Adat Tahunan',
                'tanggal_kegiatan' => now()->subWeeks(2)->format('Y-m-d'),
                'lokasi' => 'Balai Pertemuan Desa Poto',
                'status' => 'selesai',
                'gambar' => 'kegiatan/keg-5.jpg',
                'deskripsi' => '<p>Musyawarah adat tahunan yang dihadiri oleh seluruh perangkat lembaga adat, tokoh masyarakat, dan perwakilan warga dari masing-masing dusun. Musyawarah ini membahas beberapa hal penting:</p>'
                    . '<p><strong>Agenda:</strong></p>'
                    . '<ol><li>Evaluasi kegiatan adat selama satu tahun terakhir</li></ol>'
                    . '<ol><li>Penetapan kalender adat tahun depan (Taun Samawa)</li></ol>'
                    . '<ol><li>Pembahasan sengketa tanah ulayat yang belum terselesaikan</li></ol>'
                    . '<ol><li>Rencana perbaikan fisik balai adat</li></ol>'
                    . '<ol><li>Program regenerasi pengurus adat</li></ol>'
                    . '<p>Musyawarah berjalan dengan lancar dan menghasilkan 12 keputusan yang akan dilaksanakan sepanjang tahun depan.</p>',
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
            ['judul' => 'Pawai Ta\'aruf Maulid', 'gambar' => 'galeri/gal-1.jpg', 'deskripsi' => '<p>Iring-iringan pawai ta\'aruf keliling desa</p>', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Pembacaan Barzanji', 'gambar' => 'galeri/gal-2.jpg', 'deskripsi' => '<p>Pembacaan syair Maulid di Masjid Nurul Iman</p>', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Penampilan Gendang Beleq', 'gambar' => 'galeri/gal-3.jpg', 'deskripsi' => '<p>Grup Gendang Beleq Desa Poto tampil di acara Maulid</p>', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Makan Bajambau Maulid', 'gambar' => 'galeri/gal-4.jpg', 'deskripsi' => '<p>Makan bersama warga dalam perayaan Maulid</p>', 'tanggal_dokumentasi' => now()->subWeeks(3)->format('Y-m-d'), 'kegiatan_id' => $kegiatanMaulid?->id],
            ['judul' => 'Persiapan Festival Ponan', 'gambar' => 'galeri/gal-5.jpg', 'deskripsi' => '<p>Warga menyiapkan sesajen dan hiasan janur</p>', 'tanggal_dokumentasi' => now()->subMonth()->format('Y-m-d'), 'kegiatan_id' => null],
            ['judul' => 'Doa Bersama Ponan', 'gambar' => 'galeri/gal-6.jpg', 'deskripsi' => '<p>Doa bersama dipimpin oleh Tua Loka</p>', 'tanggal_dokumentasi' => now()->subMonth()->format('Y-m-d'), 'kegiatan_id' => null],
        ];

        foreach ($galeri as $item) {
            Galeri::updateOrCreate(
                ['judul' => $item['judul']],
                collect($item)->only(['gambar', 'deskripsi', 'kegiatan_id', 'tanggal_dokumentasi'])->toArray()
            );
        }
    }
}
