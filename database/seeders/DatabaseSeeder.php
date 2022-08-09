<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\NewsPiki;
use App\Models\AgendaPiki;
use App\Models\AnggotaPiki;
use App\Models\BackendFaq;
use App\Models\SponsorPiki;
use App\Models\CategoryNews;
use App\Models\DataBankIuran;
use App\Models\DataRekening;
use App\Models\DynamicForm;
use App\Models\DynamicTable;
use App\Models\HeaderPikiMobile;
use App\Models\jenisPemasukan;
use App\Models\JenisSetoran;
use App\Models\MasterMenuNavbar;
use App\Models\ProgramPiki;
use App\Models\StaticField;
use Illuminate\Database\Seeder;
use Database\Seeders\IndoRegionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;


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

        HeaderPikiMobile::create([
            'picture_path' => '1659926313_mobile device cut cover.png',
            'created_at' => Carbon::parse(Carbon::now())->timestamp,
        ]);

        ProgramPiki::create([
            'judul_program' => 'digital library',
            'slug' => 'digital-library',
            'picture_path_program' => '1659927735_digital.jpeg',
            'keterangan_foto' => '<div>digital library</div>',
            'isi_program' => '<div>digital library yang dimiliki PIKI SUMUT</div>',
            'created_at' => Carbon::parse(Carbon::now())->timestamp,
        ]);

        ProgramPiki::create([
            'judul_program' => 'jurnal ilmiah',
            'slug' => 'jurnal-ilmiah',
            'picture_path_program' => '1659927935_jurnal.jpeg',
            'keterangan_foto' => '<div>jurnal ilmiah</div>',
            'isi_program' => '<div>jurnal ilmiah yang di lakukan oleh PIKI SUMUT</div>',
            'created_at' => Carbon::parse(Carbon::now())->timestamp,
        ]);

        ProgramPiki::create([
            'judul_program' => 'human development',
            'slug' => 'human-development',
            'picture_path_program' => '1659928051_hrd.jpeg',
            'keterangan_foto' => '<div>human development</div>',
            'isi_program' => '<div>Indeks Pembangunan Manusia atau Human Development Index adalah pengukuran perbandingan dari harapan hidup, melek huruf, pendidikan dan standar hidup. IPM menjelaskan bagaimana penduduk dapat mengakses hasil pembangunan dalam memperoleh pendapatan, kesehatan, pendidikan, dan sebagainya.</div>',
            'created_at' => Carbon::parse(Carbon::now())->timestamp,
        ]);

        NewsPiki::create([
            'judul_berita' => 'PIKI Inisiasi Cara Kurangi Ikan Red Devil di Danau Toba, Ini Solusinya',
            'slug' => 'piki-inisiasi-cara-kurangi-ikan-red-devil-di-danau-toba-ini-solusinya',
            'picture_path' => '1659927213_WhatsApp Image 2022-06-06 at 13.31.12.jpeg',
            'category_news_id' => 1,
            'keterangan_foto' => '<div><em>Ketua DPD PIKI Sumut, Naslindo Sirait bersama Dierektur TB. Silalahi Centre dalam pertemuan dengan Wakil Bupati Toba,Tonny Simanjuntak memberi pemaparan sekaitan rencana pengurangan ikan red devil di Danau Toba.</em></div>',
            'excerpt'    => '<div><em>DPD Persatuan Intelegensia Kristen Indonesia (PIKI) Provinsi Sumatra Utara bekerja sama dengan pegiat pupuk organik menginisiasi solusi pengurangan keberadaan ikan predator (red devil) di Danau Toba. Mereka menawarkan solusi berupa penangkapan oleh nelayan atau masyarakat dan nantinya ikan tersebut akan dijadikan bahan pupuk organik.<br><br>"Tujuan utama bagaimana keberadaan ikan konsumsi sejenis ikan nila, mujahir, lele dan ikan mas bisa kembali seperti sedia kala di perairan Danau Toba yang dijadikan nelayan sebagai pendapatan keluarga untuk dijual sebagai kebutuhan pangan bagi masyarakat. Sekarang sudah berkurang bahkan nyaris sulit didapat karena dimangsa oleh....</em></div>',
            'isi_berita' => '<div>DPD Persatuan Intelegensia Kristen Indonesia (PIKI) Provinsi Sumatra Utara bekerja sama dengan pegiat pupuk organik menginisiasi solusi pengurangan keberadaan ikan predator (red devil) di Danau Toba. Mereka menawarkan solusi berupa penangkapan oleh nelayan atau masyarakat dan nantinya ikan tersebut akan dijadikan bahan pupuk organik.<br><br>"Tujuan utama bagaimana keberadaan ikan konsumsi sejenis ikan nila, mujahir, lele dan ikan mas bisa kembali seperti sedia kala di perairan Danau Toba yang dijadikan nelayan sebagai pendapatan keluarga untuk dijual sebagai kebutuhan pangan bagi masyarakat. Sekarang sudah berkurang bahkan nyaris sulit didapat karena dimangsa oleh ikan red devil," ujar Ketua DPD PIKI Provinsi Sumut, Dr Naslindo Sirait MM, Kamis (2/6/2022), di TB Centre Balige, Kabupaten Toba, Sumatra Utara.<br><br></div><div>Naslindo yang juga Kabag Perekonomian Pemerintahan Provinsi Sumatera Utara mengatakan, permasalahan keberadaan ikan red devil sudah memasuki tingkat kecemasan bagi nelayan dan masyarakat. Sebab, hasil produksi ikan konsumsi sudah sangat sedikit dan sulit untuk berkembang.<br><br></div><div>"Keluhan ini menjadi atensi bagi PIKI dan atas dasar itu juga akan diupayakan bagaimana meminimalisir atau menekan pertumbuhan ikan setan merah yang cukup signifikan, sehingga perkembangan ikan konsumsi bisa kembali pulih. Untuk cara yang dikaji membuat kerja sama dengan nelayan dan masyarakat bagi yang berhasil melakukan tangkapan akan dihargai berupa uang sehingga ada keseriusan," sebutnya.<br><br></div><div>Kata Naslindo, hasil tangkapan ikan red devil akan dikumpulkan dan dijual kepada penggiat pupuk organik untuk diolah menjadi pupuk organik cair sejenis NPK.<br><br></div><div>"Upaya yang dilakukan tidak semata pemusnahan, namun bagaimana hasil tangkapan ikan red devil bisa lebih bernilai ekonomi setelah diolah menjadi pupuk organik atau pakan ternak," ucapnya seraya mengajak seluruh stakeholder, termasuk jemaat rumah ibadah, BUMN/BUMD supaya lebih peduli memberi perhatian akan keluhan tersebut.<br><br></div><div>Penggiat pupuk organik, Ezher Tobing mengakui bahwa ikan red devil bisa dijadikan sebagai bahan baku pupuk organik dan pakan ternak dengan kualitas yang tidak kalah dari produksi pabrik. Bahan bahan baku ikan red devil untuk pembuatan pupuk organik juga jauh lebih murah<br><br></div><div>"Berbagai percobaan pengolahan sudah dilakukan untuk saat ini lebih tepat ikan red devil dapat dijadikan pupuk organik. Untuk harga berapa perkilo Ikan red devil yang ditawarkan kepada masyarakat atau nelayan yang berhasil melakukan tangkapan untuk saat ini masih dikaji," ucapnya.<br><br></div><div>Wakil Bupati Toba, Tonny Simanjuntak didampingi Plt.Kadis Koperindag, Salomo Simanjuntak dan protokoler Chandra Simanjuntak sangat mengapresiasi sumbangsih dan pemikiran yang direncanakan DPD PIKI Sumut dan penggiat pupuk organik.<br><br></div><div>"Ke depan kolaborasi ini terus terjalin hingga keberadaan ikan konsumsi kembali pulih mencukupi kebutuhan pangan, juga peningkatan ekonomi bagi nelayan," katanya.<br><br></div><div>Usai pemaparan, secara bersama-sama menyaksikan bagaimana pengolahan ikan red devil bisa menjadi pupuk organik yang memiliki kualitas sama dengan pupuk jenis NPK. Dalam pertemuan itu juga hadir Direktur Yayasan TB Centre, Ika Nainggolan.<br><br></div><div>Sementara DPC PIKI Toba dihadiri ketua Midian Manurung didampingi Tonggo Pardede, Henri Sibarani, dan Ketua PIKI Humbahas, Jhonsar Lumban Toruan.<br><br></div><div><br><br></div>',
            'created_at' => Carbon::parse(Carbon::now())->timestamp,
        ]);

        NewsPiki::create([
            'judul_berita' => 'Dr Naslindo Sirait Terpilih Jadi Ketua DPD PIKI Sumut',
            'slug' => 'Dr-Naslindo-Sirait-Terpilih-Jadi-Ketua-DPD-PIKI-Sumut',
            'picture_path' => '1659927286_9844_Dr-Naslindo-Sirait-Terpilih-Jadi-Ketua-DPD-PIKI-Sumut.jpg',
            'category_news_id' => 5,
            'keterangan_foto' => '<p>DIULOSI: Ketua DPP PIKI Dr Badikenita Sitepu, Ketua DPD PIKI Sumut Jhon Eron Lumban Gaol SE, penasehat Dr RE Nainggolan, Ir GM Chandra Panggabean, Dr Edward Simanjuntak, JA Ferdinandus, Marnix Hutabarat dan tokoh tokoh Kristen lainnya foto bersama usai diulosi pada pembukaan Konferda DPD PIKI Sumut, Sabtu (27/11) di GBI Tabernacle of David Hotel JW Marriot, Medan.</p>',
            'excerpt'    => 'Dr Naslindo Sirait MM terpilih menjadi Ketua DPD Persatuan Inteligensia Kristen Indonesia (PIKI) Sumut, pada Konferensi Daerah PIKI Sumut, Sabtu (27/11), di Gereja GBI Tabernacle of David Hotel JW Marriot, Jalan Perintis Kemerdekaan Medan. Naslindo terpilih secara aklamasi setelah panitia, senior dan 4 orang calon bermusyawarah. Keempat calon tersebut adalan Dr Adolfina Elisabeth Komaesakh, Prof Dr Marihot Manullang, Piliaman Simarmata SH dan Dr Naslindo Sirait. Setelah musyawarah selama 2 jam lebih, maka disepakatilah Nasindo Sirait menjadi Ketua Umum DPD PIKI Sumut periode 2021-2026 menggantikan Jhon Eron Lumban Gaol SE. Konferda dibuka dan ditutup oleh Ketua Umum DPP PIKI Dr Badikenita Putri Sitepu yang juga anggota DPD RI asal Sumut. Acara diawali dengan ibadah dipimpin Pdt Edy Prayitno, ibadah penutup oleh Pdt Stevent Kumenit MTh',
            'isi_berita' => '<p>Dr Naslindo Sirait MM terpilih menjadi Ketua DPD Persatuan Inteligensia Kristen Indonesia (PIKI) Sumut, pada Konferensi Daerah PIKI Sumut, Sabtu (27/11), di Gereja GBI Tabernacle of David Hotel JW Marriot, Jalan Perintis Kemerdekaan Medan. Naslindo terpilih secara aklamasi setelah panitia, senior dan 4 orang calon bermusyawarah.</p><p>Keempat calon tersebut adalan Dr Adolfina Elisabeth Komaesakh, Prof Dr Marihot Manullang, Piliaman Simarmata SH dan Dr Naslindo Sirait. Setelah musyawarah selama 2 jam lebih, maka disepakatilah Nasindo Sirait menjadi Ketua Umum DPD PIKI Sumut periode 2021-2026 menggantikan Jhon Eron Lumban Gaol SE.</p><p>Konferda dibuka dan ditutup oleh Ketua Umum DPP PIKI Dr Badikenita Putri Sitepu yang juga anggota DPD RI asal Sumut. Acara diawali dengan ibadah dipimpin Pdt Edy Prayitno, ibadah penutup oleh Pdt Stevent Kumenit MTh. Persidangan dipimpin Steering Committee Ir Ronald Naibaho MSi kemudian setelah ketua terpilih, sidang dipimpin Jadi Pane SPd MM (Sekretaris DPD PIKI Sumut) didampingi Agus Zega dari DPC Nias dan Ramses Manullang dari DPC Medan.</p><p>Kemudian ditetapkan 5 formatur yang akan bekerja paling lama 2 bulan untuk menyusun kepengurusan. Formatur dipimpin Naslindo Sirait bersama Iwan Batubara mewakili DPP, Jadi Pane mewakili DPD, Jhon Sukatendel dari DPC Karo dan Trimen Harefa dari DPC Kota Gunungsitoli.</p><p>Terpilihnya Ketua PIKI Sumut secara aklamasi sesuai harapan Ketua Demisioner Jhon Eron Lumban Gaol beserta penasehat Ir GM Chandra Panggabean dan senior PIKI seperti Dr RE Nainggolan dan Dr Edward Simanjuntak, JA Ferdinandus yang hadir dalam Konferda tersebut.</p><p>Eron mengatakan, PIKI ini bukan gerakan, tapi persatuan yang mengedepankan musyawarah dan mufakat. Sehingga dalam Konferda tidak ada yang merasa dikalahkan. Pemilihan secara musyawarah ini sudah menjadi harapan panitia ketika beraudiensi di Harian SIB, Senin (22/11) yang diterima Wakil Pemimpin Umum Ir GM Chandra Panggabean yang juga penasehat DPD PIKI Sumut.</p><p>“Pada Konferda DPD PIKI sebelumnya, ketua dipilih secara aklamasi, begitu juga Munas DPP PIKI Dr Badikenita Sitepu dari Sumut, terpilih aklamasi jadi Ketua Umum. Jadi musyawarah untuk mufakat di PIKI harus kita kedepankan, agar tidak ada istilah kalah dan menang dalam Konferda,” kata Eron.</p><p>Naslindo Sirait yang juga Kepala Biro Ekonomi Pemprov Sumut ini mengajak semua pihak bergandengan tangan dari berbagai elemen, karena PIKI bagian penting yang tidak bisa dipisahkan untuk mewujudkan cita-cita berbangsa, yaitu masyarakat yang merdeka, makmur dan adil.</p><p>Menurut dia, persoalan akan semakin berat, diperlukan pemikiran yang cerdas dan intelektual yang baik. Persoalan-persoaan di Sumut sangat ditentukan sejauh mana kepemimpinan yang ada termasuk pemimpin lokal. Untuk itu PIKI harus dibangun untuk mempersiapkan calon pemimpin, apakah di legislatif, birokrasi, profesional atau di tempat-tempat lain sehingga semuanya bisa bergerak.</p><p>“Kita tidak bisa berjalan sendiri-sendiri, harus bergandengan tangan dengan orang lain. Kepemimpinan menjadi sangat penting tapi lebih penting lagi membangun etika dan karakter. Karena bangsa yang besar, daerah yang besar, pemimpin besar lahir karena karakter. Itulah pemimpin yang memiliki visioner yang tentunya nilai-nilai kekristenan ada di dalamnya, PIKI harus mewujudkan itu,” terangnya.</p><p>Menurut dia, pengalaman senior yang panjang sangat dibutuhkan pengurus yang baru, sehingga pendekatan PIKI adalah proaktif, bukan reaktif. Sehingga apapun masalah di Sumut agar didiskusikan setiap bulan sesuai kepakaran masing-masing. “Saya menerima amanah ini bukan berkeinginan menjadi tokoh sentral, tapi mau membangun potensi yang tinggi di PIKI. Sehingga kepakaran-kepakaran bisa didistribusikan ke perguruan-perguruan tinggi. Sehingga PIKI menjadi rumah besar sehingga bisa bicara di banyak aspek, karena tidak mungkin pakar bicara banyak hal. Semakin kita professional, disitulah kepakaran kita,” ucapnya.</p><p>Dikatakannya bahwa keadaan sudah berubah tapi organisasi dan perilaku tidak berubah maka tujuan tidak akan terwujud.</p><p>Untuk itu dibangunlah komunikasi yang baik dengan membangun DPC-DPC. Kehadiran PIKI di Sumut harus memberi kesejukan, bisa membantu pemerintah, membantu gereja dan semuanya. “Kekuatan PIKI ada di cabang-cabang, sehingga harus inovatif sehingga apa yang menjadi cita-cita bangsa bisa diwujudkan,” tegasnya.</p>
            <p>Tokoh masyarakat Sumut Dr RE Nainggolan berharap PIKI Sumut semakin tampil ke depan dalam membangun dinamika yang semakin baik. Lewat kritik dan saran konstruktif dan pembicaraan yang lentur seperti tokoh nasional Sabam Sirait almarhum. Sabam Sirait lentur dalam pembicaraan tapi tegas dalam keputusan, senyumnya tetap ada tapi kata-katanya tegas.</p><p>Turut hadir gembala Pembina GBI Sumatera Resort Pdt Dr R Bambang Jonan, Bishop GMI Pdt Kristi Wilson Sinurat, Ketua PGI Medan Pdt Erwin Tambunan MTh, Pdt Yosafat Marbun, Ketua-ketua DPC diantaranya Ketua DPC Medan Ramses Simanullang SE MSi, Ketua DPC P Siatar Pdt Sunggul Pasaribu, Dr dr Horas Rajagukguk Sp.B FINACS, Marnix Hutabarat dari PGI, Herbin Hutabarat. Turut hadir mendampingi Ketua Umum DPP Badikenita Sitepu yakni Iwan Butarbutar, Restu Pencawan, Edison Sinaga dan Haris Silalahi.</p>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Naslindo Sirait Dilantik Jadi Ketua PIKI Sumut',
            'slug' => 'Naslindo-Sirait-Dilantik-Jadi-Ketua-PIKI-Sumut',
            'picture_path' => '1659927341_1609_Naslindo-Sirait-Dilantik-Jadi-Ketua-PIKI-Sumut.jpg',
            'category_news_id' => 3,
            'keterangan_foto' => '<p>PIKI: Ketum DPP PIKI, Dr Badikenita Putri Sitepu MSi (tengah) diapit Ketua SU Dr Naslindo Sirait MM, Sekretaris Kamser M Sitanggang SAk dan Bendahara Dr Bertha M Silalahi MSi (di barisan depan) di HKBP Tanjung Sari Medan, Sabtu (19/3) dan unsur DPP Sekjen Pdt Audy MR Wuisang MTh, Waketum Iwan Butar-butar SE MSi serta Drs Anton Panggabean MM (dua dari kiri). Di barisan belakang cendikiawan Kristen Dr Chandra Situmeang MEAk, Drs Bantors Sihombing MSi, Dra Nurhawati Simamora MSi, Pdt Dr Rosiany Hutagalung SP MTh dan Dra Odorlin Sihite MPdK.</p>',
            'excerpt'    => 'Ketua Umum Dewan Pimpinan Pusat (DPP) Persatuan Intelegensia Kristen (PIKI), Dr Badikenita Putri Sitepu MSi melantik Dewan Pimpinan Daerah (DPD) PIKI Sumatera Utara (SU) periode 2021-2026',
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

        NewsPiki::create([
            'judul_berita' => 'Toba Fashion Week 2022 Digelar 26-28 Agustus, Tampilkan Ragam Keunikan Danau Toba',
            'slug' => 'toba-fashion-week-2022-digelar-26-28-agustus-tampilkan-ragam-keunikan-danau-toba',
            'picture_path' => '1659947980_toba vasion week.jpg',
            'category_news_id' => 2,
            'keterangan_foto' => '<div><em>Danau Toba (Foto maritim)</em></div>',
            'excerpt'    => 'TOBA Fashion Week akan digelar pada 26-28 Agustus 2022. Event tersebut akan jadi ajang promosi wisata, tradisi, budaya, serta kearifan lokal di kawasan Danau Toba Sumatera Utara.Pemerintah Kabupaten Samosir mendukung pelaksanaan kegiatan yang digagas oleh Badan Penyelenggara Otorita Danau Toba (BPODT) itu. Harapannya ke depan bermanfaat bagi pengembangan pariwisata dan kesejahteraan masyarakat"Pemkab Samosir mendukung kegiatan Toba Fashion Week, dan Samosir siap untuk menjadi tuan rumah kegiatan tersebut di tahun berikutnya," kata Bupati Samosir Vandiko T. Gultom di Pangururan, Rabu.Bupati juga mengharapkan agar kegiatan Toba Fashion Week tersebut dapat menonjolkan keindahan alam di masing-masing daerah di Kawasan Danau Toba. Sehingga ke depannya kegiatan Toba Fashion Week bisa bermanfaat bagi pengembangan wisata Danau Toba dan berdampak bagi kesejahteraan masyarakat setempat.Sebelumnya Direktur Utama Badan Penyelenggara Otorita Danau Toba (BPODT) Jimmy Bernardo Panjaitan menjelaskan bahwa Toba Fashion Week merupakan salah satu dari 17 Calender of Event Danau Toba 2022.Menurut dia, acara ini dirancang untuk menjadi kegiatan yang merupakan kebanggaan bersama masyarakat di Kawasan Danau Toba. Kegiatan tersebut diproyeksikan dapat menjadi salah satu ikon wisata dan akan menambah kunjungan wisatawan.',
            'isi_berita' => '<div><strong>TOBA</strong> Fashion Week akan digelar pada 26-28 Agustus 2022. Event tersebut akan jadi ajang promosi wisata, tradisi, budaya, serta kearifan lokal di kawasan Danau Toba Sumatera Utara.<br><br></div><div>Pemerintah Kabupaten Samosir mendukung pelaksanaan kegiatan yang digagas oleh Badan Penyelenggara Otorita Danau Toba (BPODT) itu. Harapannya ke depan bermanfaat bagi pengembangan pariwisata dan kesejahteraan masyarakat<br><br>"Pemkab Samosir mendukung kegiatan Toba Fashion Week, dan Samosir siap untuk menjadi tuan rumah kegiatan tersebut di tahun berikutnya," kata Bupati Samosir Vandiko T. Gultom di Pangururan, Rabu.<br><br></div><div>Bupati juga mengharapkan agar kegiatan Toba Fashion Week tersebut dapat menonjolkan keindahan alam di masing-masing daerah di Kawasan Danau Toba. Sehingga ke depannya kegiatan Toba Fashion Week bisa bermanfaat bagi pengembangan wisata Danau Toba dan berdampak bagi kesejahteraan masyarakat setempat.<br><br>Sebelumnya Direktur Utama Badan Penyelenggara Otorita Danau Toba (BPODT) Jimmy Bernardo Panjaitan menjelaskan bahwa Toba Fashion Week merupakan salah satu dari 17 Calender of Event Danau Toba 2022.<br><br></div><div>Menurut dia, acara ini dirancang untuk menjadi kegiatan yang merupakan kebanggaan bersama masyarakat di Kawasan Danau Toba. Kegiatan tersebut diproyeksikan dapat menjadi salah satu ikon wisata dan akan menambah kunjungan wisatawan.<br><br>Sumber.<br></div>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'PIKI Gelar RAKERNAS I dengan Tema “Tegakkanlah Keadilan”',
            'slug' => 'piki-gelar-rakernas-i-dengan-tema-tegakkanlah-keadilan',
            'picture_path' => '1659947953_rakernas 2.jpg',
            'category_news_id' => 1,
            'keterangan_foto' => '<div>Bogor – PIKI menggelar Rakernas 1 yang di selenggarakan dari mulai tanggal 9 Juli sampai dengan 10 Juli yang bertempat di Resort Kinasih Cisarua Bogor dengan mengusung tema “Tegakkanlah Keadilan (Amos 5:15)</div>',
            'excerpt'    => 'Rakernas I PIKI dihadiri oleh 34 DPD Se Indonesia dan Bakal Calon DPD secara Daring, terlihat Kontingen DPD Kalimantan Barat yang hadir mewakili adalah Ketua DPD Drs.T.T.A Nyarong.,M.Si dan Wakil Ketua DPD Erani,S.T.,M.T., dan acara tersebut dibuka oleh ketua umum PIKI Dr.Badikenita Putri Sitepu,S.E.,M.Si.Adapun Rakernas I&nbsp; berdasarkan informasi yang diterima oleh Awak media akan membahas seperti.Perubahahan AD ARTProgram OrganisasiDraft Rancangan Undang – Undang Propinsi IKNPersiapan Kongres Ke 7 PIKITentang Paskah Nasional rencana yang akan di adakan di Titik Nol IKN bersama Aras Nasional dan Lembaga keumatan yang lainnyaIsue – isue Strategis lainnya',
            'isi_berita' => '<div>Rakernas I PIKI dihadiri oleh 34 DPD Se Indonesia dan Bakal Calon DPD secara Daring, terlihat Kontingen DPD Kalimantan Barat yang hadir mewakili adalah Ketua DPD Drs.T.T.A Nyarong.,M.Si dan Wakil Ketua DPD Erani,S.T.,M.T., dan acara tersebut dibuka oleh ketua umum PIKI Dr.Badikenita Putri Sitepu,S.E.,M.Si.<br><br>Adapun Rakernas I&nbsp; berdasarkan informasi yang diterima oleh Awak media akan membahas seperti.</div><ol><li>Perubahahan AD ART</li><li>Program Organisasi</li><li>Draft Rancangan Undang – Undang Propinsi IKN</li><li>Persiapan Kongres Ke 7 PIKI</li><li>Tentang Paskah Nasional rencana yang akan di adakan di Titik Nol IKN bersama Aras Nasional dan Lembaga keumatan yang lainnya</li><li>Isue – isue Strategis lainnya</li></ol><div><br></div><div><br></div>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Antusiasme Mahasiswa Gebyar Merdeka Belajar FKIP UHN Tahun 2022 : Harmoni dan Membintang',
            'slug' => 'antusiasme-mahasiswa-gebyar-merdeka-belajar-fkip-uhn-tahun-2022-harmoni-dan-membintang',
            'picture_path' => '1659948022_uhn.jpg',
            'category_news_id' => 3,
            'keterangan_foto' => '<div>Acara Gebyar Merdeka Belajar FKIP UHN</div>',
            'excerpt'    => 'Untuk meningkatkan kemampuan Perguruan Tinggi dalalm mempromosikan dan mengelola Program Merdeka Belajar Kampus Merdeka, Fakultas Keguruan dan Ilmu Pendidikan (FKIP) Universitas HKBP Nommensen Medan sukses menggelar acara Gebyar Merdeka Belajar FKIP pada Jumat (29/07/2022) di Auditorium Fakultas Kedokteran UHN Medan Lantai 3 dengan mengangkat tema “Harmoni dan Membintang”.Penyelengaraan Gebyar Merdeka FKIP ini dalam rangka melaksanakan, mengembangkan dan membina program pendidikan, penelitian dan pengabdian kepada masyarakat menurut bidang ilmu pendidikan dan meningkatkan prestasi belajar mahasiswa di Universitas HKBP Nommensen Medan khususnya FKIP melalui Merdeka Belajar Kampus Merdeka Tahun 2022. Acara dihadiri oleh 1000an mahasiswa dengan didampingi oleh 1 orang orangtua/wali.Acara dibuka dengan penampilan tari persembahan dan sekapur sirih oleh Duta Transformasi FKIP sembari menyambut barisan prosesi serta dilanjutkan dengan ibadah singkat. Acara dilakukan secara hybrid pastinya tetap mengikuti prokes ketat dan live streaming di kanal Youtube UHN Medan Official.Chandra Ritonga, S.H selaku ketua panitia Gebyar Merdeka mengatakan acara ini merupakan salah satu bentuk mempromosikan Universitas HKBP Nommensen Medan terkhusus FKIP dengan seluruh Program Studi yang dimiliki dengan beragam prestasi yang dimiliki serta beragam beasiswa dari kampus maupun pemerintah yang dapat diterima oleh mahasiswa. “Kami mengucapkan banyak terimakasih kepada Rektor serta jajaran yang senantiasa mendukung acara ini. Marilah kita sukseskan acara ini,” ujar Chandra.&nbsp; Hal yang sama juga disampaikan oleh Rolan Manurung, S.Pd., M.Si selaku Ketua Promosi FKIP. “FKIP terus bertransfo...',
            'isi_berita' => '<div>Untuk meningkatkan kemampuan Perguruan Tinggi dalalm mempromosikan dan mengelola Program Merdeka Belajar Kampus Merdeka, Fakultas Keguruan dan Ilmu Pendidikan (FKIP) Universitas HKBP Nommensen Medan sukses menggelar acara Gebyar Merdeka Belajar FKIP pada Jumat (29/07/2022) di Auditorium Fakultas Kedokteran UHN Medan Lantai 3 dengan mengangkat tema “Harmoni dan Membintang”.<br><br></div><div>Penyelengaraan Gebyar Merdeka FKIP ini dalam rangka melaksanakan, mengembangkan dan membina program pendidikan, penelitian dan pengabdian kepada masyarakat menurut bidang ilmu pendidikan dan meningkatkan prestasi belajar mahasiswa di Universitas HKBP Nommensen Medan khususnya FKIP melalui Merdeka Belajar Kampus Merdeka Tahun 2022. Acara dihadiri oleh 1000an mahasiswa dengan didampingi oleh 1 orang orangtua/wali.<br><br></div><div>Acara dibuka dengan penampilan tari persembahan dan sekapur sirih oleh Duta Transformasi FKIP sembari menyambut barisan prosesi serta dilanjutkan dengan ibadah singkat. Acara dilakukan secara <em>hybrid</em> pastinya tetap mengikuti prokes ketat dan <em>live streaming</em> di kanal Youtube UHN Medan Official.<br><br></div><div>Chandra Ritonga, S.H selaku ketua panitia Gebyar Merdeka mengatakan acara ini merupakan salah satu bentuk mempromosikan Universitas HKBP Nommensen Medan terkhusus FKIP dengan seluruh Program Studi yang dimiliki dengan beragam prestasi yang dimiliki serta beragam beasiswa dari kampus maupun pemerintah yang dapat diterima oleh mahasiswa. “Kami mengucapkan banyak terimakasih kepada Rektor serta jajaran yang senantiasa mendukung acara ini. Marilah kita sukseskan acara ini,” ujar Chandra.&nbsp; Hal yang sama juga disampaikan oleh Rolan Manurung, S.Pd., M.Si selaku Ketua Promosi FKIP. “FKIP terus bertransformasi dan melakukan perubahan-perubahan. Keluarga besar FKIP tetaplah berkontribusi untuk memajukan FKIP,” ajak Rolan.<br><br></div><div>Salah satu Perwakilan Mahasiswa Berprestasi, Chelsi Situmorang dalam sambutannya mengatakan kiranya apa yang ditampilkan ini dapat menguji dan mengolah potensi mahasiswa dalam mengikuti setiap kegiatan di kampus UHN Medan dan ia juga berharap kiranya kegiatan ini dapat dilakukan tahun depan. Hal senada juga disampaikan oleh Perwakilan orangtua mahasiswa, T. Br. Sihombing yang berasal dari Sibolga. “Saya sangat mengucapkan terimakasih kepada Bapak Rektor, Dekan, Bapak Ibu Dosen. Tingginya mutu pendidikan di Nommensen ini tidak kalah dengan perguruan tinggi yang ada diluar sana. Nommensen ini sangat luar biasa mutu pendidikan. Buat mahasiswa berilah contoh beretika berbicara yang sopan, berilah contoh yang luar biasa supaya kampus kita ini terkenal di masyarakat,” ucapnya.<br><br></div><div>Pada acara ini juga, Rektor UHN Medan Dr. Haposan Siallagan, S.H.,M.H memberangkatkan 348 mahasiswa FKIP Pemenang Program Pertukaran Mahasiswa Merdeka (PMM) dan 50 mahasiswa Pemenang Kampus Mengajar 4 (KM-4). Dilaksanakan juga Penyerahan Laporan Kerja oleh 238 mahasiswa Pemenang KM-3 dan 25 mahasiswa Pemenang Magang Studi Independen Bersertifikat (MSIB Batch 2). Acara dilanjutkan dengan Rembuk dan Diskusi Program Kerja Dekan untuk TA 2022/2023, 2023/2024, 2024/2025 oleh Dekan FKIP serta Syukuran Dosen Pembimbing Lapangan (DPL) KM-2 dosen2 FKIP yang banyak memenangkan kompetisi-kompetisi yang mampu bersaing di tingkat nasional. Acara gebyar juga dimeriahkan dengan berbagai perlombaan seperti lomba vokal Trio, Lomba tari dan stand up comedy.<br><br></div><div>Sementara itu, Dekan FKIP UHN Medan, Dr. Mula Sigiro, M.Si., Ph.D mengatakan FKIP merupakan campuran dari seni dan ilmu pengetahuan. Dimana pengajarannya menggabungkan aplikasi praktis dan teori untuk tugas dan fungsi. “Adik-adik mahasiswa, FKIP tidak bisa sukses tanpa kesuksesan kalian. FKIP tidak bisa berkarya tanpa kalian. Karena kalian lah ujung tombak kami di fakultas. Bagaimana kami menuntun mengarahkan kalian, kami mohon kerjasama dan tetap kita saling berkolaborasi supaya semakin banyak mahasiswa yang berprestasi dan akan membintang, bekerja dan berkarya dengan rendah hati,” ujar Dekan.<br><br></div><div>Rektor UHN Medan, Dr. Haposan Siallagan, S.H.,M.H pada sambutannya merasa bangga karena Nommensen berada di urutan ke-3 kampus peraih Program Pertukaran Mahasiswa Merdeka (PMM) terbanyak se- Indonesia yang didominasi oleh mahasiswa FKIP. “Oleh karena itu kehebatan ini semua hanya dapat diteruskan kalau moto Harmoni dan membintang bisa dilanjutkan. Dalam mengerjakannya kita harus betul-betul berhikmat. Saudara adalah duta kampus kita ini. Anda cukup beruntung mendapatkan program ini dan jangan disia-siakan,” tutup Rektor.<br><br></div><div>Dipenghujung acara, Samuel J. Sinaga, M.Pd selaku pemandu acara mengumumkan juara tiap lomba. Untuk kategori vokal trio : HMP Pendidikan Bahasa dan sastra Indonesia (Juara I), HMP Pendidikan Bahasa Inggris (Juara 2), HMP Pendidikan Ekonomi (Juara 3); Kategori Lomba tari : HMP Pendidikan&nbsp; Fisika (Juara 1), HMP Pendidikan Agama Kristen (Juara 2), HMP&nbsp; Pendidikan Matematika (Juara 3), dan Kategori Stand up comedy : HMP Pendidikan Bahasa Inggris (Juara 1), HMP Pendidikan PPkN (Juara 2), HMP Pendidikan Fisika (Juara 3).</div>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Fakultas Kedokteran Universitas Methodist Indonesia TERAKREDITASI',
            'slug' => 'fakultas-kedokteran-terakreditasi',
            'picture_path' => '1659948061_fk methodist.jpg',
            'category_news_id' => 3,
            'keterangan_foto' => '<div>Ilustrasi Mahasiswa Fakultas Kedokteran Universitas Methodist Indonesia</div>',
            'excerpt'    => 'Fakultas Kedokteran UMI saat ini mengelola program studi Kedokteran Umum dan Profesi Dokter dengan status TERAKREDITASI. Program studi ini dirancang untuk mendidik mahasiswa menjadi tenaga professional di bidang kedokteran. Lulusan program ini nantinya siap untuk mengembangkan dan memanfaatkan pengetahuan, keahlian professional maupun personal dalam dunia kedokteran maupun pendidikan. Untuk sampai pada tahap penyelesaian Profesi Dokter total SKS yang harus diselesaikan sebanyak 195 SKS, dengan ketentuan : Sarjana Kedokteran 155 SKS ditambah 40 SKS Kepaniteraan Kllinik Junior (KKJ) dan Kepaniteraan Klinik Senior (KKS).Sejak Tahun Akademik 2006/2007, Fakultas Kedokteran menggunakan kurikulum berbasis kompetensi (standar Internasional). Kurikulum semacam ini juga diterapkan di Maastricht Faculty Of Medicine (Belanda), Brown Faculty Of Medicine (USA).Metode belajar-mengajar yang diterapkan adalah Belajar Mandiri Terarah (Seven Jumps - Problem based Learning), Kuliah Pakar, Latihan Keterampilan Medik (Skill laboratory Practice), Pengalaman Belajar Lapangan, dan Praktikum terintegrasi.Untuk mendukung kemampuan tersebut mahasiswa diarahkan pada pemecahan kasus kasus dengan pemahaman pada metode yang benar. Pada saat ini Universitas Methodist Indonesia telah mendirikan RSU Pendidikan Methodist Susanna Wesley yang terletak di Jl. Setiabudi Pasar II yang jaraknya berdekatan dengan Kampus II Tanjung Sari. Rumah Sakit ini nantinya diharapkan akan mendukung mahasiswa dalam mengaplikasikan ilmu yang telah diperolehnya untuk dapat langsung berinteraksi dengan pasien.',
            'isi_berita' => '<div>Fakultas Kedokteran UMI saat ini mengelola program studi Kedokteran Umum dan Profesi Dokter dengan status <strong>TERAKREDITASI</strong>. Program studi ini dirancang untuk mendidik mahasiswa menjadi tenaga professional di bidang kedokteran. Lulusan program ini nantinya siap untuk mengembangkan dan memanfaatkan pengetahuan, keahlian professional maupun personal dalam dunia kedokteran maupun pendidikan. Untuk sampai pada tahap penyelesaian Profesi Dokter total SKS yang harus diselesaikan sebanyak 195 SKS, dengan ketentuan : Sarjana Kedokteran 155 SKS ditambah 40 SKS Kepaniteraan Kllinik Junior (KKJ) dan Kepaniteraan Klinik Senior (KKS).<br><br></div><div>Sejak Tahun Akademik 2006/2007, Fakultas Kedokteran menggunakan kurikulum berbasis kompetensi (standar Internasional). Kurikulum semacam ini juga diterapkan di Maastricht Faculty Of Medicine (Belanda), Brown Faculty Of Medicine (USA).<br><br></div><div>Metode belajar-mengajar yang diterapkan adalah Belajar Mandiri Terarah (Seven Jumps - Problem based Learning), Kuliah Pakar, Latihan Keterampilan Medik (Skill laboratory Practice), Pengalaman Belajar Lapangan, dan Praktikum terintegrasi.<br><br></div><div>Untuk mendukung kemampuan tersebut mahasiswa diarahkan pada pemecahan kasus kasus dengan pemahaman pada metode yang benar. Pada saat ini Universitas Methodist Indonesia telah mendirikan RSU Pendidikan Methodist Susanna Wesley yang terletak di Jl. Setiabudi Pasar II yang jaraknya berdekatan dengan Kampus II Tanjung Sari. Rumah Sakit ini nantinya diharapkan akan mendukung mahasiswa dalam mengaplikasikan ilmu yang telah diperolehnya untuk dapat langsung berinteraksi dengan pasien.<br><br></div>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Ekonomi INDONESIA Tumbuh Tinggi pada Triwulan II 2022',
            'slug' => 'ekonomi-indonesia-tumbuh-tinggi-pada-triwulan-ii-2022',
            'picture_path' => '1659948085_bi.jpg',
            'category_news_id' => 1,
            'keterangan_foto' => '<div>Ekonomi Indonesia Tumbuh Tinggi pada Triwulan II 2022</div>',
            'excerpt'    => 'Berdasarkan data Badan Pusat Statistik (BPS), ekonomi Indonesia tumbuh tinggi pada triwulan II 2022, di tengah risiko pelemahan ekonomi global dan tekanan inflasi yang meningkat. Perkembangan tersebut tercermin pada pertumbuhan ekonomi triwulan II 2022 yang mencapai 5,44% (yoy), jauh di atas capaian triwulan sebelumnya 5,01% (yoy). Akselerasi kinerja ekonomi ditopang oleh permintaan domestik yang terus meningkat, terutama konsumsi rumah tangga, dan kinerja ekspor yang tetap tinggi. Perbaikan ekonomi nasional juga tercermin pada peningkatan pertumbuhan mayoritas lapangan usaha dan di seluruh wilayah. Ke depan, perbaikan ekonomi Indonesia diprakirakan masih berlanjut, didukung oleh peningkatan mobilitas, sumber pembiayaan, dan aktivitas dunia usaha. Namun demikian, dampak perlambatan ekonomi global terhadap kinerja ekspor dan potensi tertahannya konsumsi rumah tangga akibat kenaikan inflasi patut diwaspadai.Dari sisi pengeluaran, pertumbuhan ekonomi pada triwulan II 2022 didukung oleh hampir seluruh komponennya. Konsumsi rumah tangga tumbuh tinggi sebesar 5,51% (yoy), jauh di atas capaian triwulan sebelumnya sebesar 4,34% (yoy). Kinerja positif tersebut didorong oleh peningkatan mobilitas masyarakat seiring dengan semakin longgarnya kebijakan pembatasan mobilitas dan aktivitas terkait perayaan Hari Besar Keagamaan Nasional (HBKN). Investasi tumbuh melambat sebesar 3,07 % (yoy), terutama investasi bangunan, di tengah kinerja investasi nonbangunan yang tetap baik. Sementara itu, konsumsi Pemerintah masih terkontraksi sebesar 5,24% (yoy) terutama bersumber dari penurunan belanja barang untuk Penanganan Covid-19 dan Pemulihan Ekonomi Nasional (PC-PEN) sejalan dengan m...',
            'isi_berita' => '<div>Berdasarkan data Badan Pusat Statistik (BPS), ekonomi Indonesia tumbuh tinggi pada triwulan II 2022, di tengah risiko pelemahan ekonomi global dan tekanan inflasi yang meningkat. Perkembangan tersebut tercermin pada pertumbuhan ekonomi triwulan II 2022 yang mencapai 5,44% (yoy), jauh di atas capaian triwulan sebelumnya 5,01% (yoy). Akselerasi kinerja ekonomi ditopang oleh permintaan domestik yang terus meningkat, terutama konsumsi rumah tangga, dan kinerja ekspor yang tetap tinggi. Perbaikan ekonomi nasional juga tercermin pada peningkatan pertumbuhan mayoritas lapangan usaha dan di seluruh wilayah. Ke depan, perbaikan ekonomi Indonesia diprakirakan masih berlanjut, didukung oleh peningkatan mobilitas, sumber pembiayaan, dan aktivitas dunia usaha. Namun demikian, dampak perlambatan ekonomi global terhadap kinerja ekspor dan potensi tertahannya konsumsi rumah tangga akibat kenaikan inflasi patut diwaspadai.<br><br></div><div>Dari sisi pengeluaran, pertumbuhan ekonomi pada triwulan II 2022 didukung oleh hampir seluruh komponennya. Konsumsi rumah tangga tumbuh tinggi sebesar 5,51% (yoy), jauh di atas capaian triwulan sebelumnya sebesar 4,34% (yoy). Kinerja positif tersebut didorong oleh peningkatan mobilitas masyarakat seiring dengan semakin longgarnya kebijakan pembatasan mobilitas dan aktivitas terkait perayaan Hari Besar Keagamaan Nasional (HBKN). Investasi tumbuh melambat sebesar 3,07 % (yoy), terutama investasi bangunan, di tengah kinerja investasi nonbangunan yang tetap baik. Sementara itu, konsumsi Pemerintah masih terkontraksi sebesar 5,24% (yoy) terutama bersumber dari penurunan belanja barang untuk Penanganan Covid-19 dan Pemulihan Ekonomi Nasional (PC-PEN) sejalan dengan membaiknya kondisi pandemi Covid-19. Pertumbuhan ekspor tercatat meningkat sebesar 19,74% (yoy), ditopang oleh permintaan mitra dagang utama yang tetap kuat. Sementara itu, impor tumbuh tinggi sebesar 12,34% (yoy) sejalan dengan kinerja permintaan domestik dan ekspor yang membaik.&nbsp;<br><br></div><div>Dari sisi Lapangan Usaha (LU), kinerja hampir seluruh LU pada triwulan II 2022 menunjukkan berlanjutnya perbaikan ekonomi. Perbaikan itu terutama didorong oleh beberapa LU seperti Industri Pengolahan, Transportasi dan Pergudangan, serta Perdagangan Besar dan Eceran. Sementara itu, LU Penyediaan Akomodasi dan Makan Minum juga mencatat pertumbuhan yang tinggi didorong oleh pelonggaran syarat perjalanan dan peningkatan aktivitas terkait perayaan HBKN. Secara spasial, perbaikan ekonomi ditopang oleh peningkatan pertumbuhan yang terjadi di seluruh wilayah Indonesia, dengan pertumbuhan tertinggi tercatat di wilayah Sulawesi-Maluku-Papua (Sulampua), diikuti Jawa, Sumatera, Kalimantan, dan Bali-Nusa Tenggara (Balinusra).<br><br></div>',
        ]);

        NewsPiki::create([
            'judul_berita' => 'Johnny Plate Soal RI Merdeka Search Engine: Belum Disiapkan.',
            'slug' => 'johnny-plate-soal-ri-merdeka-search-engine-belum-disiapkan',
            'picture_path' => '1659948127_menteri-komunikasi-dan-informatika-menkominfo-johnny-g-plate_169.png',
            'category_news_id' => 7,
            'keterangan_foto' => '<div>Menkominfo Johnny G Plate</div>',
            'excerpt'    => 'Menteri Komunikasi dan Informatika Johnny G Plate mengatakan Indonesia potensi punya mesin pencari atau search engine seperti google milik perusahaan Amerika Serikat (AS). Menurutnya search engine merupakan bukti perkembangan teknologi di Indonesia. Namun untuk mengembangkannya saat ini, Indonesia masih menemukan sejumlah hambatan."Saat ini kita belum menyiapkannya karena memang kita punya waktu dan biaya selama ini kan lebih banyak perhatiannya untuk menangani Covid-19," ujar Johnny kepada wartawan, Senin (8/8).',
            'isi_berita' => '<div>Menteri Komunikasi dan Informatika Johnny G Plate mengatakan Indonesia potensi punya mesin pencari atau search engine seperti google milik perusahaan Amerika Serikat (AS). Menurutnya search engine merupakan bukti perkembangan teknologi di Indonesia. Namun untuk mengembangkannya saat ini, Indonesia masih menemukan sejumlah hambatan.<br><br>"Saat ini kita belum menyiapkannya karena memang kita punya waktu dan biaya selama ini kan lebih banyak perhatiannya untuk menangani Covid-19," ujar Johnny kepada wartawan, Senin (8/8).<br><br></div>',
        ]);

        NewsPiki::create([
            'judul_berita' => '5 Fakta Ikan Red Devil yang Dilarang Keberadaannya di Indonesia',
            'slug' => '5-fakta-ikan-red-devil-yang-dilarang-keberadaannya-di-indonesia',
            'picture_path' => '1659948146_ikan-red-devil.jpeg',
            'category_news_id' => 2,
            'keterangan_foto' => '<div>Ikan Red Devi. (Foto: Detik)</div>',
            'excerpt'    => 'Ikan Red Devil bukanlah fauna asli Indonesia. Ikan ini sempat membuat heboh karena muncul di Danau Toba dan mengganggu ekosistem asli di danau kebanggaan masyarakat Sumatra Utara ini. Jika melihat penampakannya, ikan Red Devil memiliki rupa yang cantik dan cocok untuk dikoleksi. Inilah yang membuat beberapa penghobi ikan menjadikan Red Devil sebagai salah satu ikan hias.Fakta Ikan Red Devil:1. Tempat asal ikan Red DevilDihimpun dari data detikEdu, ikan Red Devil yang memiliki nama latin Cichlasoma labiatum adalah spesies ikan asal Danau Managua dan Danau Nikaragua di Amerika Tengah. Awalnya, ikan ini dikenalkan sebagai ikan hias di Indonesia.Di beberapa daerah di Indonesia, ikan Red Devil kerap disebut setan merah, ikan oscar, louhan merah, dan nonong. Meski memiliki warna yang cantik dan figur seperti ikan lohan, ikan Red Devil bukanlah ikan yang bisa dipelihara. Ikan ini memiliki sifat agresif dan pemakan segala.Dalam Jurnal Kebijakan Perikanan Indonesia, Balai Penelitian dan Pengembangan Kementerian Kelautan dan Perikanan Republik Indonesia ikan itu disebut sebagai ikan predator yang amat rakus.2. Termasuk ikan predatorRed Devil dikenal sebagai karnivora, meskipun sebenarnya ikan ini adalah hewan pemakan segala atau omnivora. Selain memakan ikan-ikan kecil, mereka juga memakan cacing dan tumbuhan akuatik."Sebagai ikan yang bersifat predator, ikan iblis akan memangsa ikan yang lebih kecil yang sebagian besar mangsanya tersebut bisa jadi adalah benih-benih ikan endemik asli perairan tersebut," jelas Darmawan Setia Budi S.Pi., M.Si., dosen Prodi Akuakultur SIKIA Banyuwangi UNAIR dalam laman resmi UNAIR.3. Awal masuk ke IndonesiaIkan Red Devil bukanlah spesies as...',
            'isi_berita' => '<div>Ikan Red Devil bukanlah fauna asli Indonesia. Ikan ini sempat membuat heboh karena muncul di Danau Toba dan mengganggu ekosistem asli di danau kebanggaan masyarakat Sumatra Utara ini. Jika melihat penampakannya, ikan Red Devil memiliki rupa yang cantik dan cocok untuk dikoleksi. Inilah yang membuat beberapa penghobi ikan menjadikan Red Devil sebagai salah satu ikan hias.<br><br>Fakta Ikan Red Devil:<br>1. Tempat asal ikan Red Devil<br>Dihimpun dari data detikEdu, ikan Red Devil yang memiliki nama latin Cichlasoma labiatum adalah spesies ikan asal Danau Managua dan Danau Nikaragua di Amerika Tengah. Awalnya, ikan ini dikenalkan sebagai ikan hias di Indonesia.<br><br>Di beberapa daerah di Indonesia, ikan Red Devil kerap disebut setan merah, ikan oscar, louhan merah, dan nonong. Meski memiliki warna yang cantik dan figur seperti ikan lohan, ikan Red Devil bukanlah ikan yang bisa dipelihara. Ikan ini memiliki sifat agresif dan pemakan segala.<br><br>Dalam Jurnal Kebijakan Perikanan Indonesia, Balai Penelitian dan Pengembangan Kementerian Kelautan dan Perikanan Republik Indonesia ikan itu disebut sebagai ikan predator yang amat rakus.<br><br>2. Termasuk ikan predator<br>Red Devil dikenal sebagai karnivora, meskipun sebenarnya ikan ini adalah hewan pemakan segala atau omnivora. Selain memakan ikan-ikan kecil, mereka juga memakan cacing dan tumbuhan akuatik.<br><br>"Sebagai ikan yang bersifat predator, ikan iblis akan memangsa ikan yang lebih kecil yang sebagian besar mangsanya tersebut bisa jadi adalah benih-benih ikan endemik asli perairan tersebut," jelas Darmawan Setia Budi S.Pi., M.Si., dosen Prodi Akuakultur SIKIA Banyuwangi UNAIR dalam laman resmi UNAIR.<br><br>3. Awal masuk ke Indonesia<br>Ikan Red Devil bukanlah spesies asli Indonesia. Namun, ikan ganas ini sudah banyak muncul di perairan air tawar Tanah Air sejak puluhan tahun lalu.<br><br>Dilansir dari CNBC (3/8) peneliti mencatat ikan Red Devil masuk ke Indonesia sekitar 1990-an, dibawa dari Malaysia dan Singapura lalu disebar di beberapa waduk buatan di Indonesia.<br><br>Peneliti juga menemukan bahwa ikan Red Devil sengaja dilepas di perairan Indonesia oleh para penggemar ikan hias. Pelepasan ikan ini diklaim tanpa pengkajian yang jelas sehingga berakibat populasi Red Devil meluas dengan cepat sampai mendominasi dan merusak beberapa perairan.<br><br>4. Red Devil mudah berkembang biak<br>Ikan Red Devil bisa hidup di perairan tropis dengan suhu air 21 sampai 26 derajat celcius, dengan kandungan pH sekitar 6.0-8.0.<br><br>Red devil hidup di daerah permukaan dan teritorial di suatu perairan. Ikan ini juga disebut mudah berkembang biak karena betina bisa mengeluarkan ribuan telur, dan dapat bertelur sepanjang tahun.<br><br>Red Devil juga tercatat sebagai ikan yang memiliki umur panjang. Ikan ini dapat hidup 10 sampai 12 tahun. Bahkan dikabarkan mereka bisa hidup lebih lama lagi. Dilansir dari Aquarium Source, angka harapan hidup ikan Red Devil dipengaruhi oleh kualitas air.<br><br>Ikan ini juga dikenal memiliki kemampuan adaptasi yang baik. Itulah mengapa ikan Red Devil bisa hidup di perairan tawar mana saja.<br><br>5. Ikan Red Devil dilarang di Indonesia<br>Menurut Our Endangered World, ikan Red Devil yang memiliki sifat agresif ini dapat merusak populasi ikan lain di suatu perairan. Ikan ini dapat dengan mudah memangsa spesies endemik di suatu daerah dan menjadikan ikan Red Devil sebagai "penguasa" perairan.<br><br>Karena sifatnya berbahaya, ikan Red Devil termasuk dalam spesies yang dilarang keberadaannya di Indonesia. Pemerintah Indonesia mengeluarkan aturan larangan ikan Red Devil melalui peraturan yang dikeluarkan Menteri Kelautan dan Perikanan.<br><br>Dalam Peraturan Menteri Kelautan dan Perikanan No 41/PERMEN Kp/2014, ikan Red Devil masuk sebagai hewan air yang dilarang di Indonesia.<br><br>Demikian beberapa fakta seputar ikan Red Devil yang ganas sehingga dilarang keberadaannya di Indonesia.<br><br>Detik.com</div>',
        ]);

        CategoryNews::create([
            'name' => 'Nasional',
            'slug' => 'indonesia-flag',
            'picture_path_kategori_berita' => '1659933588_nasional.jpg',
        ]);

        CategoryNews::create([
            'name' => 'Daerah',
            'slug' => 'region',
            'picture_path_kategori_berita' => '1659933620_daerah2.jpeg',
        ]);

        CategoryNews::create([
            'name' => 'Kampus',
            'slug' => 'campus',
            'picture_path_kategori_berita' => '1659933632_kampus.jpeg',
        ]);

        CategoryNews::create([
            'name' => 'Gereja',
            'slug' => 'church',
            'picture_path_kategori_berita' => '1659938849_hkbp tanjung sari.jpg',
        ]);

        CategoryNews::create([
            'name' => 'Ekonomi',
            'slug' => 'economy',
            'picture_path_kategori_berita' => '1659933676_ekonomi.jpg',
        ]);

        CategoryNews::create([
            'name' => 'Politik',
            'slug' => 'bendera-indonesia',
            'picture_path_kategori_berita' => '1659933690_politik.jpg',
        ]);

        CategoryNews::create([
            'name' => 'Teknologi',
            'slug' => 'computer',
            'picture_path_kategori_berita' => '1659933714_technology.jpeg',
        ]);

        CategoryNews::create([
            'name' => 'Budaya',
            'slug' => 'north-sumatra',
            'picture_path_kategori_berita' => '1659933729_unsplash Tjong A Fie.jpe',
        ]);

        AgendaPiki::create([
            'nama_agenda' => 'Persatuan Intelegensia Kristen Indonesia (PIKI) Sumut Gelar Rapat Pleno',
            'keterangan_agenda' => 'Dewan Perwakilan Daerah Persatuan Intelegensia Kristen Indonesia (PIKI) Sumatera Utara 2021-2026 menggelar Rapat Pleno I Sumut di Politeknik Wilmar Bisnis Indonesia pada hari Sabtu tanggal 9 April 2021',
            'picture_path' => '1659934657_IMG-20220409-WA0139.jpg'
        ]);
        AgendaPiki::create([
            'nama_agenda' => 'PIKI Inisiasi Cara Kurangi Ikan Red Devil di Danau Toba, Ini Solusinya',
            'keterangan_agenda' => 'DPD Persatuan Intelegensia Kristen Indonesia (PIKI) Provinsi Sumatra Utara bekerja sama dengan pegiat pupuk organik menginisiasi solusi pengurangan keberadaan ikan predator (red devil) di Danau Toba. Mereka menawarkan solusi berupa penangkapan oleh nelayan atau masyarakat dan nantinya ikan tersebut akan dijadikan bahan pupuk organik.',
            'picture_path' => '1659934705_WhatsApp Image 2022-06-06 at 13.31.12.jpeg'
        ]);
        AgendaPiki::create([
            'nama_agenda' => 'Naslindo Sirait Dilantik Jadi Ketua PIKI Sumut',
            'keterangan_agenda' => 'Naslindo Sirait Dilantik Jadi Ketua PIKI Sumut',
            'picture_path' => '1659934732_1609_Naslindo-Sirait-Dilantik-Jadi-Ketua-PIKI-Sumut.jpg'
        ]);
        AgendaPiki::create([
            'nama_agenda' => 'Dr Naslindo Sirait Terpilih Jadi Ketua DPD PIKI Sumut',
            'keterangan_agenda' => 'Dr Naslindo Sirait MM terpilih menjadi Ketua DPD Persatuan Inteligensia Kristen Indonesia (PIKI) Sumut, pada Konferensi Daerah PIKI Sumut, Sabtu (27/11), di Gereja GBI Tabernacle of David Hotel JW Marriot, Jalan Perintis Kemerdekaan Medan. Naslindo terpilih secara aklamasi setelah panitia, senior dan 4 orang calon bermusyawarah. Keempat calon tersebut adalan Dr Adolfina Elisabeth Komaesakh, Prof Dr Marihot Manullang, Piliaman Simarmata SH dan Dr Naslindo Sirait. Setelah musyawarah selama 2 jam lebih, maka disepakatilah Nasindo Sirait menjadi Ketua Umum DPD PIKI Sumut periode 2021-2026 menggantikan Jhon Eron Lumban Gaol SE. Konferda dibuka dan ditutup oleh Ketua Umum DPP PIKI Dr Badikenita Putri Sitepu yang juga anggota DPD RI asal Sumut. Acara diawali dengan ibadah dipimpin Pdt Edy Prayitno, ibadah penutup oleh Pdt Stevent Kumenit MTh',
            'picture_path' => '1659934748_9844_Dr-Naslindo-Sirait-Terpilih-Jadi-Ketua-DPD-PIKI-Sumut.jpg'
        ]);

        User::create([
            'username' => 'ketua',
            'name' => 'ketua',
            'phone_number' => '+6281234567890',
            'email' => 'admindummy@dummy.com',
            'nik' => '1234567890123451',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'super-admin', //baru'
            'password' => bcrypt('piki1'),
        ]);

        User::create([
            'username' => 'sekretaris',
            'name' => 'admin umum',
            'phone_number' => '+6281234567890',
            'email' => 'superdummy@dummy.com',
            'nik' => '1234567890123452',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'admin', //baru'
            'password' => bcrypt('piki2'),
        ]);
        User::create([
            'username' => 'bendahara',
            'name' => 'bendahara',
            'phone_number' => '+6281234567890',
            'email' => 'bendaharadummy@dummy.com',
            'nik' => '1234567890123453',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'bendahara', //baru'
            'password' => bcrypt('piki3'),
        ]);

        User::create([
            'username' => 'wakil ketua',
            'name' => 'wakil ketua',
            'phone_number' => '+6281234567890',
            'email' => 'dummy2@2dummy.com',
            'nik' => '1234567890123454',
            'address' => 'alamat2 dummy',
            'province' => 'sumut2 dummy',
            'city' => 'kota dummy2',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'wakil-ketua', //baru'
            'password' => bcrypt('piki4'),
        ]);

        User::create([
            'username' => 'organisasi',
            'name' => 'organisasi',
            'phone_number' => '+6281234567890',
            'email' => 'organisasidummy@dummy.com',
            'nik' => '1234567890123455',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'organisasi', //baru'
            'password' => bcrypt('piki5'),
        ]);

        User::create([
            'username' => 'infokom',
            'name' => 'infokom',
            'phone_number' => '+6281234567890',
            'email' => 'infokomdummy@dummy.com',
            'nik' => '1234567890123456',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'infokom', //baru'
            'password' => bcrypt('piki6'),
        ]);

        User::create([
            'username' => 'media',
            'name' => 'media',
            'phone_number' => '+6281234567890',
            'email' => 'mediadummy@dummy.com',
            'nik' => '1234567890123457',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'media', //baru'
            'password' => bcrypt('piki7'),
        ]);

        User::create([
            'username' => 'spi',
            'name' => 'spi',
            'phone_number' => '+6281234567890',
            'email' => 'spidummy@dummy.com',
            'nik' => '1234567890123458',
            'address' => 'alamat dummy',
            'province' => 'sumut dummy',
            'city' => 'kota dummy',
            'district' => 'Kec. Medan Tuntungan dummy',
            'village' => 'simpang selayang dummy',
            'job' => 'web dummy',
            'business_fields' => 'Software House dummy',
            'description_of_skills' => 'laravel dummy',
            'status_anggota' => 'diterima',
            'level' => 'spi', //baru'
            'password' => bcrypt('piki8'),
        ]);


        User::create([
            'username' => 'Naek Silitonga, dr',
            'name' => 'Naek Silitonga, dr',
            'phone_number' => '+6281265519278',
            'email' => 'naeksilitonga@ymail.com',
            'nik' => '1271143105740001',
            'address' => 'Jl. Jamil Lubis No. 114 Medan',
            'province' => 'SUMATERA UTARA',
            'city' => 'KOTA MEDAN',
            'district' => 'MEDAN TEMBUNG',
            'village' => 'BANDAR SELAMAT',
            'job' => 'Pegawai Negeri Sipil',
            'business_fields' => 'Kesehatan',
            'description_of_skills' => 'Dokter',
            'password' => '$2y$10$1fUwGJTDr9QZsY8PrVKIBO5e8fxVTR00/fM82MdBf5lCoskXnAD9y',
        ]);

        User::create([
            'username' => 'Irwan Ginting,S.Pd',
            'name' => 'Irwan Ginting,S.Pd',
            'phone_number' => '+6281361679508',
            'email' => 'irwangin7ing70@gmail.com',
            'nik' => '1271040505700009',
            'address' => 'JL BUKU GANG JOHAR 61',
            'province' => 'SUMATERA UTARA',
            'city' => 'KOTA MEDAN',
            'district' => 'MEDAN PETISAH',
            'village' => 'SEI PUTIH BARAT',
            'job' => 'Wiraswasta',
            'business_fields' => 'Pribadi',
            'description_of_skills' => 'Managerial, biasa menangani team sales, kredit dan collection termasuk pengelolaan SDM.',
            'password' => '$2y$10$2QZziZmkTgvUTaVYd19eEO8W9S.hqeD.LlbpRAhzzGBdVHWrwKCZ.',
        ]);

        User::create([
            'username' => 'Lenny Fytrya Sihombing',
            'name' => 'Lenny Fytrya Sihombing',
            'phone_number' => '+6282167953324',
            'email' => 'trya24sihombing@gmail.com',
            'nik' => '1272086411880001',
            'address' => 'Jl. Bunga lawang',
            'province' => 'SUMATERA UTARA',
            'city' => 'KABUPATEN SIMALUNGUN',
            'district' => 'SIANTAR',
            'village' => 'PEMATANG SIMALUNGUN',
            'job' => 'Pengajar',
            'business_fields' => 'Live Streaming Project',
            'description_of_skills' => 'Mengoperasikan live streaming',
            'password' => '$2y$10$UFC7T9tm31k8r4G5ydYcnOA9GLsMCRXb04VQWn0zieapmXZ4XHYOu',
        ]);

        User::create([
            'username' => 'Henri Sibarani, SE.,Ak, M.Si',
            'name' => 'Henri Sibarani, SE.,Ak, M.Si',
            'phone_number' => '+6282139011056',
            'email' => 'henrisibarani0704@gmail.com',
            'nik' => '3516130704690004',
            'address' => 'KOMP TASBI BLOK JJ NO.11',
            'province' => 'SUMATERA UTARA',
            'city' => 'KOTA MEDAN',
            'district' => 'MEDAN SUNGGAL',
            'village' => 'TANJUNG REJO',
            'job' => 'PNS',
            'business_fields' => 'Sumber Daya Manusia',
            'description_of_skills' => 'Perpajakan, Manajemen SDM',
            'password' => '$2y$10$aqzMMq6PKJCVvtnknET5S.rEhhj.K1dV1uHIgBdcQ8kV5Fjlx2jEK',
        ]);

        User::create([
            'username' => 'Junius Ndraha, SE, MM',
            'name' => 'Junius Ndraha, SE, MM',
            'phone_number' => '+6281396949000',
            'email' => 'junius.ndraha@gmail.com',
            'nik' => '1207261806820007',
            'address' => 'Jl. Arah Idanogawo No. 52 Km. 21,2 Desa Lolozasai',
            'province' => 'SUMATERA UTARA',
            'city' => 'KABUPATEN NIAS',
            'district' => 'GIDO',
            'village' => 'LOLOZASAI',
            'job' => 'Wiraswasta',
            'business_fields' => 'Barang/Jasa, Usaha Depot Air Minum Isi Ulang(DAMIU)',
            'description_of_skills' => 'Ahli Manajemen Air Minum Tingkat Utama, design grafis, editor video, dll',
            'password' => '$2y$10$3rYYWiB4W0BsVfYWKHUIf.JzZditXRiKujISOBxQq7qC5ZDEZXpk6',
        ]);

        User::create([
            'username' => 'ELI TOHONAN TUA PANE, M.PD',
            'name' => 'ELI TOHONAN TUA PANE, M.PD',
            'phone_number' => '+6285262970630',
            'email' => 'elittpane@gmail.com',
            'nik' => '1271200101720004',
            'address' => 'Jl.Bunga Wijaya Kesuma No.1 B Pasar 4 Lk.X Tanjung Sari Medan Selayang Kota Medan',
            'province' => 'SUMATERA UTARA',
            'city' => 'KOTA MEDAN',
            'district' => 'MEDAN SELAYANG',
            'village' => 'PADANG BULAN SELAYANG II',
            'job' => 'PNS Kemendikbud',
            'business_fields' => 'Pendidikan',
            'description_of_skills' => 'Master trainer PAUD',
            'password' => '$2y$10$vmfHPyurgP4UN2p0MqDr1OryHi/vyLjYEyW0KoL2oL/PbhXT1BFcS',
        ]);

        User::create([
            'username' => 'Piki Darma Kristian Pardede',
            'name' => 'Piki Darma Kristian Pardede',
            'phone_number' => '+6281266656992',
            'email' => 'pikipardede16@gmail.com',
            'nik' => '1308051612940005',
            'address' => 'Jl. Syamsiar Thaib JR Tampang',
            'province' => 'SUMATERA BARAT',
            'city' => 'KABUPATEN PASAMAN',
            'district' => 'LUBUK SIKAPING',
            'village' => 'DURIAN TINGGI',
            'job' => 'Dosen/Tenaga Pengajar',
            'business_fields' => 'Pendidikan',
            'description_of_skills' => 'Kebijakan Publik dan Pemerintahan',
            'password' => '$2y$10$/unek.rYyEAAJxTuyEyobOudXT6zSp0HXMg17rHfA9syUh9HGFHfS',
        ]);

        User::create([
            'username' => 'Symtoy S S.Kom',
            'name' => 'Symtoy S S.Kom',
            'phone_number' => '+6281264167702',
            'email' => 'symtoy@gmail.com',
            'nik' => '1271180707850001',
            'address' => 'Simeme Desa Sipultak',
            'province' => 'SUMATERA UTARA',
            'city' => 'KABUPATEN TAPANULI UTARA',
            'district' => 'PAGARAN',
            'village' => 'SIPULTAK',
            'job' => 'Pendamping Desa',
            'business_fields' => 'Ternak Ayam',
            'description_of_skills' => 'Komputer',
            'password' => '$2y$10$COPM683dLuFyWx52xNNsouiQPwyjYaHeDdVRBfERWfnFqrFQU2vaa',
        ]);

        User::create([
            'username' => 'Hotlan Robinson Sihotang',
            'name' => 'Hotlan Robinson Sihotang',
            'phone_number' => '+6281375878802',
            'email' => 'hotlansihotang1984@yahoo.com',
            'nik' => '1215080411840001',
            'address' => 'Janji',
            'province' => 'SUMATERA UTARA',
            'city' => 'KABUPATEN HUMBANG HASUNDUTAN',
            'district' => 'DOLOK SANGGUL',
            'village' => 'JANJI',
            'job' => 'PNS',
            'business_fields' => 'Penatu',
            'description_of_skills' => 'Moderasi Beragama',
            'password' => '$2y$10$zVOXtbMZyyKU6FVYznGFsOSIpQ5O/ENydNNCv/pEHqCpqH6tHez76',
        ]);

        User::create([
            'username' => 'san',
            'name' => 'san',
            'gender' => 'Pria',
            'phone_number' => '+6281375878802',
            'email' => 'san@yahoo.com',
            'nik' => '1215080411840009',
            'address' => 'Janji',
            'province' => 'SUMATERA UTARA',
            'city' => 'KABUPATEN HUMBANG HASUNDUTAN',
            'district' => 'DOLOK SANGGUL',
            'village' => 'JANJI',
            'job' => 'PNS',
            'business_fields' => 'Penatu',
            'description_of_skills' => 'Moderasi Beragama',
            'password' => bcrypt('san'),
        ]);

        SponsorPiki::create([
            'picture_path' => '1659943232_sponsor.jpeg',
            'konten_sponsor' => 'Komitmen Pertamina terhadap Program Keberlanjutan.

            JAKARTA – Pertamina berkomitmen untuk program keberlanjutan atau sustainability. Hal ini disampaikan oleh Vice President Investor Relation Juferson Mangempis dalam forum Malaysia Technology Expo (MTE) 2022.

            Ia mengatakan ambisi Pertamina adalah menjadi perusahaan Energi Global yang terkemuka dan bereputasi baik serta diakui sebagai Perusahaan Ramah Lingkungan, Perusahaan yang Bertanggung Jawab Sosial, dan Perusahaan Tata Kelola yang Baik.

            “Strategi keberlanjutan kami diterjemahkan ke dalam 10 Fokus Keberlanjutan, masing-masing selaras dengan SDGs dan memiliki target utamanya. Perubahan iklim tidak. Satu prioritas dalam fokus kami. Strategi kami dijalankan melalui inisiatif prioritas, antara lain mengembangkan Net Zero Roadmap, Dekarbonisasi, dan Meningkatkan Kapasitas EBT,” ujarnya.

            Pertamina mengalokasikan CAPEX sebesar 14% untuk Energi Bersih, Baru, dan Terbarukan. Komitmen Pertamina ini sejalan dengan upaya pemanfaatan sumber daya dalam negeri untuk memasok energi dalam negeri menuju pembangunan hijau dan dekarbonisasi.

            “Mendukung Decarbonization Roadmap 2030,  Pertamina telah menetapkan target pengurangan emisi 30% pada tahun 2030, dibandingkan dengan baseline 2010 kami (lingkup 1 + 2). Kami saat ini mengevaluasi target pengurangan emisi yang lebih ambisius, mungkin sekitar 38% vs baseline 2010. Ke depan, kami sedang mengembangkan Strategi Net Zero kami,” tambahnya.

            Pertamina telah mengurangi 27% emisi pada 2010-2020 untuk mendukung Kontribusi Nasional Indonesia. Pertamina juga melibatkan mitra nasional maupun internasional untuk mengeksplorasi kemitraan untuk dekarbonisasi dan mempercepat pertumbuhan EBT.

            “Kita melakukan kolaborasi dan melibatkan mitra nasional dan internasional untuk mempercepat net zero emission. Semoga kerja keras ini bisa berjalan dengan baik,” tutupnya',
        ]);

        DataRekening::create([
            'rekening_pembayaran' => 'Bank SUMUT',
            'nomor_rekening' => '1000.104.000.7722',
            'atas_nama' => 'DPD PIKI SUMUT',
        ]);

        $this->call(IndoRegionSeeder::class);

        jenisPemasukan::create([
            'jenis_pemasukan' => 'iuran',
        ]);

        jenisPemasukan::create([
            'jenis_pemasukan' => 'sumbangan',
        ]);

        DataBankIuran::create([
            'rekening_pembayaran' => 'Bank SUMUT',
            'nomor_rekening' => '1000.104.000.7722',
            'atas_nama' => 'DPD PIKI SUMUT',
        ]);

        Permission::create([
            'name' => 'header',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'berita',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'program',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'agenda',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'anggota',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'community partners',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan-pengaturan rekening bank',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan-pengaturan besaran iuran',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan-pengaturan master menu dan sub menu',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan-pengaturan form input pemasukan',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'keuangan-pengaturan form input pengeluaran',
            'guard_name' => 'web'

        ]);

        MasterMenuNavbar::create([
            'nama_menu' => 'pemasukan',
        ]);

        MasterMenuNavbar::create([
            'nama_menu' => 'pengeluaran',
        ]);

        JenisSetoran::create([
            'jenis_setoran' => 'pemasukan',
        ]);

        JenisSetoran::create([
            'jenis_setoran' => 'pengeluaran',
        ]);

        BackendFaq::create([
            'pertanyaan' => 'apa itu piki',
            'jawaban' => 'piki adalah blablabla',
        ]);

        BackendFaq::create([
            'pertanyaan' => 'question 2',
            'jawaban' => 'answer 2',
        ]);

        BackendFaq::create([
            'pertanyaan' => 'question 3',
            'jawaban' => 'answer 3',
        ]);
    }
}
