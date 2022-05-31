<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsPiki;
use App\Models\AgendaPiki;
use App\Models\SponsorPiki;
use App\Models\CategoryNews;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        NewsPiki::create([
            'judul_berita' => 'Dr Naslindo Sirait Terpilih Jadi Ketua DPD PIKI Sumut',
            'slug' => 'Dr-Naslindo-Sirait-Terpilih-Jadi-Ketua-DPD-PIKI-Sumut',
            'category_news_id' => 5,
            'keterangan_foto' => '<p>DIULOSI: Ketua DPP PIKI Dr Badikenita Sitepu, Ketua DPD PIKI Sumut Jhon Eron Lumban Gaol SE, penasehat Dr RE Nainggolan, Ir GM Chandra Panggabean, Dr Edward Simanjuntak, JA Ferdinandus, Marnix Hutabarat dan tokoh tokoh Kristen lainnya foto bersama usai diulosi pada pembukaan Konferda DPD PIKI Sumut, Sabtu (27/11) di GBI Tabernacle of David Hotel JW Marriot, Medan.</p>',
            'excerpt'    => 'Dr Naslindo Sirait MM terpilih menjadi Ketua DPD Persatuan Inteligensia Kristen Indonesia (PIKI) Sumut, pada Konferensi Daerah PIKI Sumut, Sabtu (27/11), di Gereja GBI Tabernacle of David Hotel JW Marriot, Jalan Perintis Kemerdekaan Medan. Naslindo terpilih secara aklamasi setelah panitia, senior dan 4 orang calon bermusyawarah. Keempat calon tersebut adalan Dr Adolfina Elisabeth Komaesakh, Prof Dr Marihot Manullang, Piliaman Simarmata SH dan Dr Naslindo Sirait. Setelah musyawarah selama 2 jam lebih, maka disepakatilah Nasindo Sirait menjadi Ketua Umum DPD PIKI Sumut periode 2021-2026 menggantikan Jhon Eron Lumban Gaol SE. Konferda dibuka dan ditutup oleh Ketua Umum DPP PIKI Dr Badikenita Putri Sitepu yang juga anggota DPD RI asal Sumut. Acara diawali dengan ibadah dipimpin Pdt Edy Prayitno, ibadah penutup oleh Pdt Stevent Kumenit MTh',
            'isi_berita' => '<p>Dr Naslindo Sirait MM terpilih menjadi Ketua DPD Persatuan Inteligensia Kristen Indonesia (PIKI) Sumut, pada Konferensi Daerah PIKI Sumut, Sabtu (27/11), di Gereja GBI Tabernacle of David Hotel JW Marriot, Jalan Perintis Kemerdekaan Medan. Naslindo terpilih secara aklamasi setelah panitia, senior dan 4 orang calon bermusyawarah.</p><p>Keempat calon tersebut adalan Dr Adolfina Elisabeth Komaesakh, Prof Dr Marihot Manullang, Piliaman Simarmata SH dan Dr Naslindo Sirait. Setelah musyawarah selama 2 jam lebih, maka disepakatilah Nasindo Sirait menjadi Ketua Umum DPD PIKI Sumut periode 2021-2026 menggantikan Jhon Eron Lumban Gaol SE.</p><p>Konferda dibuka dan ditutup oleh Ketua Umum DPP PIKI Dr Badikenita Putri Sitepu yang juga anggota DPD RI asal Sumut. Acara diawali dengan ibadah dipimpin Pdt Edy Prayitno, ibadah penutup oleh Pdt Stevent Kumenit MTh. Persidangan dipimpin Steering Committee Ir Ronald Naibaho MSi kemudian setelah ketua terpilih, sidang dipimpin Jadi Pane SPd MM (Sekretaris DPD PIKI Sumut) didampingi Agus Zega dari DPC Nias dan Ramses Manullang dari DPC Medan.</p><p>Kemudian ditetapkan 5 formatur yang akan bekerja paling lama 2 bulan untuk menyusun kepengurusan. Formatur dipimpin Naslindo Sirait bersama Iwan Batubara mewakili DPP, Jadi Pane mewakili DPD, Jhon Sukatendel dari DPC Karo dan Trimen Harefa dari DPC Kota Gunungsitoli.</p><p>Terpilihnya Ketua PIKI Sumut secara aklamasi sesuai harapan Ketua Demisioner Jhon Eron Lumban Gaol beserta penasehat Ir GM Chandra Panggabean dan senior PIKI seperti Dr RE Nainggolan dan Dr Edward Simanjuntak, JA Ferdinandus yang hadir dalam Konferda tersebut.</p><p>Eron mengatakan, PIKI ini bukan gerakan, tapi persatuan yang mengedepankan musyawarah dan mufakat. Sehingga dalam Konferda tidak ada yang merasa dikalahkan. Pemilihan secara musyawarah ini sudah menjadi harapan panitia ketika beraudiensi di Harian SIB, Senin (22/11) yang diterima Wakil Pemimpin Umum Ir GM Chandra Panggabean yang juga penasehat DPD PIKI Sumut.</p><p>“Pada Konferda DPD PIKI sebelumnya, ketua dipilih secara aklamasi, begitu juga Munas DPP PIKI Dr Badikenita Sitepu dari Sumut, terpilih aklamasi jadi Ketua Umum. Jadi musyawarah untuk mufakat di PIKI harus kita kedepankan, agar tidak ada istilah kalah dan menang dalam Konferda,” kata Eron.</p><p>Naslindo Sirait yang juga Kepala Biro Ekonomi Pemprov Sumut ini mengajak semua pihak bergandengan tangan dari berbagai elemen, karena PIKI bagian penting yang tidak bisa dipisahkan untuk mewujudkan cita-cita berbangsa, yaitu masyarakat yang merdeka, makmur dan adil.</p><p>Menurut dia, persoalan akan semakin berat, diperlukan pemikiran yang cerdas dan intelektual yang baik. Persoalan-persoaan di Sumut sangat ditentukan sejauh mana kepemimpinan yang ada termasuk pemimpin lokal. Untuk itu PIKI harus dibangun untuk mempersiapkan calon pemimpin, apakah di legislatif, birokrasi, profesional atau di tempat-tempat lain sehingga semuanya bisa bergerak.</p><p>“Kita tidak bisa berjalan sendiri-sendiri, harus bergandengan tangan dengan orang lain. Kepemimpinan menjadi sangat penting tapi lebih penting lagi membangun etika dan karakter. Karena bangsa yang besar, daerah yang besar, pemimpin besar lahir karena karakter. Itulah pemimpin yang memiliki visioner yang tentunya nilai-nilai kekristenan ada di dalamnya, PIKI harus mewujudkan itu,” terangnya.</p><p>Menurut dia, pengalaman senior yang panjang sangat dibutuhkan pengurus yang baru, sehingga pendekatan PIKI adalah proaktif, bukan reaktif. Sehingga apapun masalah di Sumut agar didiskusikan setiap bulan sesuai kepakaran masing-masing. “Saya menerima amanah ini bukan berkeinginan menjadi tokoh sentral, tapi mau membangun potensi yang tinggi di PIKI. Sehingga kepakaran-kepakaran bisa didistribusikan ke perguruan-perguruan tinggi. Sehingga PIKI menjadi rumah besar sehingga bisa bicara di banyak aspek, karena tidak mungkin pakar bicara banyak hal. Semakin kita professional, disitulah kepakaran kita,” ucapnya.</p><p>Dikatakannya bahwa keadaan sudah berubah tapi organisasi dan perilaku tidak berubah maka tujuan tidak akan terwujud.</p><p>Untuk itu dibangunlah komunikasi yang baik dengan membangun DPC-DPC. Kehadiran PIKI di Sumut harus memberi kesejukan, bisa membantu pemerintah, membantu gereja dan semuanya. “Kekuatan PIKI ada di cabang-cabang, sehingga harus inovatif sehingga apa yang menjadi cita-cita bangsa bisa diwujudkan,” tegasnya.</p>
            <p>Tokoh masyarakat Sumut Dr RE Nainggolan berharap PIKI Sumut semakin tampil ke depan dalam membangun dinamika yang semakin baik. Lewat kritik dan saran konstruktif dan pembicaraan yang lentur seperti tokoh nasional Sabam Sirait almarhum. Sabam Sirait lentur dalam pembicaraan tapi tegas dalam keputusan, senyumnya tetap ada tapi kata-katanya tegas.</p><p>Turut hadir gembala Pembina GBI Sumatera Resort Pdt Dr R Bambang Jonan, Bishop GMI Pdt Kristi Wilson Sinurat, Ketua PGI Medan Pdt Erwin Tambunan MTh, Pdt Yosafat Marbun, Ketua-ketua DPC diantaranya Ketua DPC Medan Ramses Simanullang SE MSi, Ketua DPC P Siatar Pdt Sunggul Pasaribu, Dr dr Horas Rajagukguk Sp.B FINACS, Marnix Hutabarat dari PGI, Herbin Hutabarat. Turut hadir mendampingi Ketua Umum DPP Badikenita Sitepu yakni Iwan Butarbutar, Restu Pencawan, Edison Sinaga dan Haris Silalahi.</p>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Naslindo Sirait Dilantik Jadi Ketua PIKI Sumut',
            'slug' => 'Naslindo-Sirait-Dilantik-Jadi-Ketua-PIKI-Sumut',
            'category_news_id' => 3,
            'keterangan_foto' => '<p>PIKI: Ketum DPP PIKI, Dr Badikenita Putri Sitepu MSi (tengah) diapit Ketua SU Dr Naslindo Sirait MM, Sekretaris Kamser M Sitanggang SAk dan Bendahara Dr Bertha M Silalahi MSi (di barisan depan) di HKBP Tanjung Sari Medan, Sabtu (19/3) dan unsur DPP Sekjen Pdt Audy MR Wuisang MTh, Waketum Iwan Butar-butar SE MSi serta Drs Anton Panggabean MM (dua dari kiri). Di barisan belakang cendikiawan Kristen Dr Chandra Situmeang MEAk, Drs Bantors Sihombing MSi, Dra Nurhawati Simamora MSi, Pdt Dr Rosiany Hutagalung SP MTh dan Dra Odorlin Sihite MPdK.</p>',
            'excerpt'    => '<p>Ketua Umum Dewan Pimpinan Pusat (DPP) Persatuan Intelegensia Kristen (PIKI), Dr Badikenita Putri Sitepu MSi melantik Dewan Pimpinan Daerah (DPD) PIKI Sumatera Utara (SU) periode 2021-2026</p>',
            'isi_berita' => '<p>Ketua Umum Dewan Pimpinan Pusat (DPP) Persatuan Intelegensia Kristen (PIKI), Dr Badikenita Putri Sitepu MSi melantik Dewan Pimpinan Daerah (DPD) PIKI Sumatera Utara (SU) periode 2021-2026 yang dikomandoi Dr Naslindo Sirait MM di HKBP Tanjung Sari Medan, Jumat (18/3).</p>
            <p>
            Mendampingi mantan Dewan Pakar DPP PIKI itu sebagai ketua, Sekretaris Kamser M Sitanggang SAk dan Bendahara Dr Bertha M Silalahi MSi. Kepengurusan diisi sejumlah nama populer di antaranya Drs Anton Panggabean MM, cendikiawan Kristen Dr Chandra Situmeang MEAk, Drs Bantors Sihombing MSi, Dra Nurhawati Simamora MSi, Pdt Dr Rosiany Hutagalung SP MTh dan Dra Odorlin Sihite MPdK.
            </p><p>
            Kegiatan didahului ibadah dilayani Pdt Untung Suseno MTh dengan mematuhi protokol kesehatan itu dihadiri seluruh organisasi Kristen dan para tokoh. Di antaranya JA Ferdinandus, Nabari Ginting, Hasiolan Sidabutar, Sihar Cibro, Ronald Naibaho, Korwil 1 PP GMKI Hendra L Manurung, pengurus GAMKI Jerry Manullang, Jonni Naibaho, Sri RM Simanungkalit yang Ketua Pospera, Inong Hanna Simbolon dan puluhan pendeta dari lintas denominasi gereja. Terlihat sejumlah pengurus DPP PIKI seperti Sekretaris Jenderal Pdt Audy MR Wuisang MTh, Waketum Iwan Butar-butar SE MSi.</p><p>
            Badikenita Sitepu minta agar kepengurusan baru melakukan konsolidasi ke seluruh kabupaten kota agar PIKI menjadi bagian pemecahan persoalan masyarakat, khususnya warga Kristiani.</p><p>
            Secara nasional, lanjut anggota DPD / MPR RI tersebut, PIKI sudah berada di seluruh Indonesia dengan kepengurusan berisi profesionalisme. Bahkan di Aceh dengan pengurus yang mumpuni. “SU sebagai daerah asal saya, harus lebih menjadikan PIKI sebagai bagian solusi persoalan,” tegasnya.</p><p>
            Naslindo Sirait dalam sambutannya memaparkan sejumlah persoalan bangsa ke depan. Dimulai dari masa Revolusi Industri 4.0 yang diwarnai disrupsi informasi di tengah revulusi teknologi. Menurutnya, hanya berapa persen penduduk Indonesia yang survive menghadapi kemajuan. “Apalagi warga SU yang tingkat intelektualismenya masih belum merata. PIKI harus menjadi penangkal disrupsi informasi yang diperburuk dengan pandemi menjadikan warga pembelajar. Betapa kita prihatin, selama pandemi yang hampir tiga tahun, anak-anak tidak lagi ke Sekolah Minggu. Sekolah formal dilakukan dengan daring, yang pasti tidak dapat banyak hasil positifnya ketimbang belajar tatap muka,” tegasnya.</p><p>
            Ia mencanangkan tonggak bahwa PIKI adalah gerakan pemikiran yang membantu gereja, pemerintah dan masyarakat dalam merumuskan kebijakan-kebijakan, ide, gagasan konstruktif dengan pendekatan intelektual (metodologis). “Sebagai gerakan kultural PIKI bertanggung jawab membawa generasi mendatang untuk dapat melintasi perubahan dengan dasar yang kuat berupa budaya dan iman percaya kepada Tuhan,” tegasnya sambil mengritik bahwa PIKI yang selama ini kerap berada di kota harus menjadi kelompok intelektual sampai ke desa bahkan pelosok guna mengedukasi masyarakat.</p><p>
            Ia menggaungkan PIKI harus menjadi gerakan advokasi bagi masyarakat yang belum tersentuh pembangunan dan termarginalkan agar lebih berpartisipasi dalam pembangunan tersebut. “Saya mohon dukungan dari semua pihak,” tegasnya.</p><p>
            Kombes Purn Dr Maruli Siahaan SH MH mewakili Dewan Penasihat menantang PIKI untuk menunjukkan kerja nyata minimal di lima tahun ke depan pimpinan yang baru dilantik. “Tadi saya cermati, pengurus ada dari latar belakang partai politik. Itu baik... biarkan PIKI ada di mana-mana tapi jangan ke mana-mana. Harus tetap menjadi bagian integral gereja dan membawa kepentingan gereja,” ujarnya.</p><p>
            Politisi Partai Golkar itu pun menantang pengurus untuk merealisir janji ketika dilantik di altar gereja. “Jangan sembarangan dilantik di gereja tapi selanjutnya, melempem,” tutupnya.</p><p>
            Mewakili Dewan Pakar Jamso Hariono Pangaribuan MM minta semangat intelegensi dalam PIKI jangan luntur.</p><p>
            Sekretaris Umum Persekutuan Gereja Indonesia (PGI) Wilayah SU Pdt Dr Eben Siagian MTh menegaskan keberadaan PIKI yang bermitra dengan seluruh lembaga keumatan. “Naslindo Sirait ini adik saya, jauh di bawah saya... tapi saya takjub karena sekarang ia sudah begitu “besar” tanggung jawabnya. Baik di lembaga gerejawi dan pemerintahan. Warga Kristen harus mendukungnya,” tutupnya.</p>',
        ]);

        CategoryNews::create([
            'name' => 'Daerah',
            'slug' => 'daerah'
        ]);

        CategoryNews::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi'
        ]);

        CategoryNews::create([
            'name' => 'Kampus',
            'slug' => 'kampus'
        ]);

        CategoryNews::create([
            'name' => 'Nasional',
            'slug' => 'nasional'
        ]);

        CategoryNews::create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);

        CategoryNews::create([
            'name' => 'Tekonologi',
            'slug' => 'tekonologi'
        ]);

        AgendaPiki::create([
            'nama_agenda' => 'Persatuan Intelegensia Kristen Indonesia (PIKI) Sumut Gelar Rapat Pleno',
            'keterangan_agenda' => 'Dewan Perwakilan Daerah Persatuan Intelegensia Kristen Indonesia (PIKI) Sumatera Utara 2021-2026 menggelar Rapat Pleno I Sumut di Politeknik Wilmar Bisnis Indonesia pada hari Sabtu tanggal 9 April 2021',
        ]);

        User::create([
            'name' => 'admin-dummy',
            'phone_number' => '+6281234567890',
            'email' => 'admindummy@dummy.com',
            'nik' => 'nik dummy',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'admin', //baru'
            'password' => bcrypt('halo123'),
        ]);

        User::create([
            'name' => 'bendahara-dummy',
            'phone_number' => '+6281234567890',
            'email' => 'bendaharadummy@dummy.com',
            'nik' => 'nik dummy',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'bendahara', //baru'
            'password' => bcrypt('halo123'),
        ]);

        User::create([
            'name' => 'organisasi-dummy',
            'phone_number' => '+6281234567890',
            'email' => 'organisasidummy@dummy.com',
            'nik' => 'nik dummy',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'organisasi', //baru'
            'password' => bcrypt('halo123'),
        ]);

        User::create([
            'name' => 'infokom-dummy',
            'phone_number' => '+6281234567890',
            'email' => 'infokomdummy@dummy.com',
            'nik' => 'nik dummy',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'infokom', //baru'
            'password' => bcrypt('halo123'),
        ]);

        User::create([
            'name' => 'san',
            'phone_number' => '+6281234567890',
            'email' => 'dummy2@2dummy.com',
            'nik' => 'nik dummy2',
            'address' => 'alamat2 dummy',
            'province' => 'sumut2 dummy',
            'city' => 'kota dummy2',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'super-admin', //baru'
            'password' => bcrypt('halo123'),
        ]);

        User::create([
            'name' => 'super',
            'phone_number' => '+6281234567890',
            'email' => 'superdummy@dummy.com',
            'nik' => 'nik dummy',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'districts' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'level' => 'super-admin', //baru'
            'password' => bcrypt('super123'),
        ]);

        User::create([
            'name' => 'Dr. Naslindo Sirait',
            'job' => 'Ketua DPD PIKI SUMUT',
        ]);

        SponsorPiki::create([
            'konten_sponsor' => 'Komitmen Pertamina terhadap Program Keberlanjutan.

            JAKARTA – Pertamina berkomitmen untuk program keberlanjutan atau sustainability. Hal ini disampaikan oleh Vice President Investor Relation Juferson Mangempis dalam forum Malaysia Technology Expo (MTE) 2022.

            Ia mengatakan ambisi Pertamina adalah menjadi perusahaan Energi Global yang terkemuka dan bereputasi baik serta diakui sebagai Perusahaan Ramah Lingkungan, Perusahaan yang Bertanggung Jawab Sosial, dan Perusahaan Tata Kelola yang Baik.

            “Strategi keberlanjutan kami diterjemahkan ke dalam 10 Fokus Keberlanjutan, masing-masing selaras dengan SDGs dan memiliki target utamanya. Perubahan iklim tidak. Satu prioritas dalam fokus kami. Strategi kami dijalankan melalui inisiatif prioritas, antara lain mengembangkan Net Zero Roadmap, Dekarbonisasi, dan Meningkatkan Kapasitas EBT,” ujarnya.

            Pertamina mengalokasikan CAPEX sebesar 14% untuk Energi Bersih, Baru, dan Terbarukan. Komitmen Pertamina ini sejalan dengan upaya pemanfaatan sumber daya dalam negeri untuk memasok energi dalam negeri menuju pembangunan hijau dan dekarbonisasi.

            “Mendukung Decarbonization Roadmap 2030,  Pertamina telah menetapkan target pengurangan emisi 30% pada tahun 2030, dibandingkan dengan baseline 2010 kami (lingkup 1 + 2). Kami saat ini mengevaluasi target pengurangan emisi yang lebih ambisius, mungkin sekitar 38% vs baseline 2010. Ke depan, kami sedang mengembangkan Strategi Net Zero kami,” tambahnya.

            Pertamina telah mengurangi 27% emisi pada 2010-2020 untuk mendukung Kontribusi Nasional Indonesia. Pertamina juga melibatkan mitra nasional maupun internasional untuk mengeksplorasi kemitraan untuk dekarbonisasi dan mempercepat pertumbuhan EBT.

            “Kita melakukan kolaborasi dan melibatkan mitra nasional dan internasional untuk mempercepat net zero emission. Semoga kerja keras ini bisa berjalan dengan baik,” tutupnya',
        ]);
    }
}
