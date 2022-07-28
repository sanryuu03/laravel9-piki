<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\NewsPiki;
use App\Models\Province;
use App\Models\IuranPiki;
use App\Models\AgendaPiki;
use App\Models\HeaderPiki;
use App\Models\Pendapatan;
use App\Models\AnggotaPiki;
use App\Models\Pengeluaran;
use App\Models\PosAnggaran;
use App\Models\ProgramPiki;
use App\Models\SponsorPiki;
use App\Models\TempAnggota;
use App\Models\CategoryNews;
use App\Models\DataRekening;
use App\Models\NamaKegiatan;
use Illuminate\Http\Request;
use App\Models\DataBankIuran;
use App\Models\SumbanganPiki;
use App\Models\DataBiayaIuran;
use App\Models\jenisPemasukan;
use App\Models\ProfileAnggota;
use App\Models\KategoriAnggota;
use App\Models\LaporanKeuangan;
use App\Models\HeaderPikiMobile;
use App\Models\MasterMenuNavbar;
use App\Models\SubKategoriAnggota;
use Illuminate\Support\Facades\View;
use App\Models\SubMenuNavbarKeuangan;
use Illuminate\Support\Facades\Storage;



class ProfileAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $user = User::where('id', request()->userid)->first();
        // dd($pendaftarBaru);
        $this->userBaru = User::where('status_anggota', 'belum di proses')-> get();
        $this->userDalamProses = User::where('status_anggota', 'dalam proses')-> get();
        $this->userDiTolak = User::where('status_anggota', 'tidak sesuai')-> get();
        $this->userDiterima = User::where('status_anggota', 'diterima')-> get();
        $Anggota = AnggotaPiki::all();
        $this->anggotaYangDitampilkan = AnggotaPiki::where('tampilkan_anggota_dilandingpage', 'ya')-> get();
        $this->kategoriAnggota = KategoriAnggota::get();
        $this->subKategoriAnggota = SubKategoriAnggota::get();

        $hitungUserBaru = count($this->userBaru);
        $hitungUseruserDalamProses = count($this->userDalamProses);
        $hitungUserDiTolak = count($this->userDiTolak);
        $hitungUserDiterima = count($this->userDiterima->skip(8));
        $hitungjabatanPikiSumut = count($Anggota);
        $this->hitunganggotaYangDitampilkan = count($this->anggotaYangDitampilkan);
        $hitungKategoriAnggota = count($this->kategoriAnggota);
        $hitungSubKategoriAnggota = count($this->subKategoriAnggota);
        // return $hitungUserDiterima;
        $pendaftarBaru = $hitungUserBaru > 0 ? $hitungUserBaru:0;
        $dalamProses = $hitungUseruserDalamProses > 0 ? $hitungUseruserDalamProses:0;
        $diTolak = $hitungUserDiTolak > 0 ? $hitungUserDiTolak:0;
        $anggotaDiterima = $hitungUserDiterima > 0 ? $hitungUserDiterima:0;
        $jabatanPikiSumut = $hitungjabatanPikiSumut > 0 ? $hitungjabatanPikiSumut:0;
        $anggotaYangDitampilkan = $this->hitunganggotaYangDitampilkan > 0 ? $this->hitunganggotaYangDitampilkan:0;
        $kategoriAnggota = $hitungKategoriAnggota > 0 ? $hitungKategoriAnggota:0;
        $subKategoriAnggota = $hitungSubKategoriAnggota > 0 ? $hitungSubKategoriAnggota:0;
        // dd($pendaftarBaru);
        // $navbarAnggota = request()->route()->getName() === 'backendanggota';
        $navbarAnggota = true;
        $urlNavbarKeuanganViaUser = false;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::get();
        View::share([
            "user" => $user,
            'pendaftarBaru' => $pendaftarBaru,
            'dalamProses' => $dalamProses,
            'diTolak' => $diTolak,
            'anggotaDiterima' => $anggotaDiterima,
            'jabatanPikiSumut' => $jabatanPikiSumut,
            'anggotaYangDitampilkan' => $anggotaYangDitampilkan,
            'kategoriAnggota' => $kategoriAnggota,
            'subKategoriAnggota' => $subKategoriAnggota,
            "navbarAnggota" => $navbarAnggota,
            "urlNavbarKeuanganViaUser" => $urlNavbarKeuanganViaUser,
            "masterMenuNavbarKeuangan" => $masterMenuNavbarKeuangan,
            "subMenuNavbarKeuangan" => $subMenuNavbarKeuangan,
        ]);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaPiki $anggotaPiki, $userid)
    {
        // return $userid;
        $user = User::where('id', $userid)->first();
        // return $user;
        $anggotaPiki = AnggotaPiki::find($userid);
        return view('admin/profileuser', [
            "title" => "PIKI - Sangrid",
            "menu" => "PIKI - CV Anggota",
            "anggotaPiki" => $anggotaPiki,
            "action" => "view",
            "user" => $user,
            "item" => $user,
            "userid" => $userid,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaPiki $anggotaPiki, $userid)
    {
        $user = User::where('id', $userid)->first();;
        $id = $request->value;
        $provinces = Province::all();
        // penggunaan http://192.168.1.7:8000/admin/landingpageanggota/edit/1?value=heheh
        return view('admin/edituser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Edit CV Anda",
            "creator" => "San",
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "id" => $id,
            "action" => "edit",
            "provinces" => $provinces,
            "user" => $user,
            "item" => $user,
            "userid" => $userid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileAnggota $profileAnggota, $userid)
    {
        // return $request;
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/profile/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            User::where('id', $userid)->update([
                'photo_profile' => $nama_file,
            ]);

            return redirect()->route('profile', $userid)->with('success', 'profile berhasil di update');
        }

        if ($request->file('picture_path_ktp')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_ktp');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/ktp/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            User::where('id', $userid)->update([
                'photo_ktp' => $nama_file,
            ]);

            return redirect()->route('profile', $userid)->with('success', 'ktp berhasil di update');
        }
        // return $request->village;
        $rules = [
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'nik' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'job' => 'required',
            'description_of_skills' => 'required',
        ];
        $data = $request->validate($rules);

        // $data = $request->validate([
        //     'province' => 'required',
        //     'city' => 'required',
        //     'district' => 'required',
        //     'village' => 'required',
        // ]);
        if ($request->province != 'Pilih Provinsi Anda') {
            $province = request()->input('province');
            if ($province) {
                $province = Province::where('id', $province)->first();
                $namaProvince = $province->name;
                $data['province'] = $namaProvince;
                TempAnggota::create(
                    [
                        'province' => $namaProvince,
                    ]
                );
            }
        }

        if ($request->city != 'Pilih Kabupaten / Kota Anda') {
            $regencies = request()->input('city');
            if ($regencies) {
                $kota = Regency::where('id', $regencies)->first();
                $namaKota = $kota->name;
                $data['city'] = $namaKota;
                TempAnggota::create(
                    [
                        'city' => $namaKota,
                    ]
                );
            }
        }
        if ($request->district != 'Pilih Kecamatan Anda') {
            $districts = request()->input('district');
            if ($districts) {
                $kecamatan = District::where('id', $districts)->first();
                $namaKecamatan = $kecamatan->name;
                $data['district'] = $namaKecamatan;
                TempAnggota::create(
                    [
                        'district' => $namaKecamatan,
                    ]
                );
            }
        }

        if ($request->village != 'Pilih Desa / Kelurahan Anda') {
            $villages = request()->input('village');
            if ($villages) {
                $desa = Village::where('id', $villages)->first();
                $namaDesa = $desa->name;
                $data['village'] = $namaDesa;
                TempAnggota::create(
                    [
                        'village' => $namaDesa,
                    ]
                );
            }
        }


        // return $request;
        $userProfileId = User::where('id', $userid)->first();
        // return $userProfileId->id;
        TempAnggota::create(
            [
                'users_id' => $userProfileId->id,
                'name' => $request->name,
                'job' => $request->job,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'jabatan_piki_sumut' => 'anggota',
            ]
        );
        User::where('id', $userProfileId->id)
            ->update($data);


        return redirect()->route('profile', $userid)->with('success', 'CV telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileAnggota $profileAnggota)
    {
        //
    }

    public function iuran($userid)
    {
        $anggotaPiki = AnggotaPiki::where('users_id', $userid)->first();
        $user = User::where('id', $userid)->first();
        $dataRekening = DataRekening::latest()->first();
        $jenisPemasukan = jenisPemasukan::all();
        $dataBiayaIuran = DataBiayaIuran::latest()->first();
        // return $anggotaPiki[0]->userid;
        return view('admin/iuranatausumbanganPiki', [
            "title" => "PIKI - Iuran",
            "menu" => "Iuran",
            "creator" => "San",
            'dataRekening' => $dataRekening,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "user" => $user,
            "userid" => $userid,
            'jenisPemasukan' => $jenisPemasukan,
            'dataBiayaIuran' => $dataBiayaIuran,
        ]);
    }

    public function saveIuran(Request $request)
    {
        // return $request;
        if ($request->jenis_setoran == null) {
            return redirect()->route('iuran', $request->id)->with('unapproved', 'Jenis Setoran Belum Dipilih !');
        }
        if ($request->jenis_setoran == 1) {
            $data = $request->except('_token');
            $data['tanggal'] = now();
            $namaBulan = $_POST['bulan'];
            $arrBulan = [];
            foreach ($namaBulan as $bulan) {
                array_push($arrBulan, $bulan);
            }
            // return $arrBulan;
            // return $data['iuran_bulan'] = $arrBulan;
            // return implode(", ",$arrBulan);
            // return implode(", ",$data['iuran_bulan'] = $arrBulan);
            $data['iuran_bulan'] = implode(", ", $arrBulan);
            if (request()->input('jumlah')) {
                $dataRupiah = $request->jumlah;
                $rupiah = str_replace(".", "", $dataRupiah);
                $data['jumlah'] = $rupiah;
            }
            $jenisPemasukan = jenisPemasukan::where('id', $request->jenis_setoran)->get();
            $namaJenisPemasukan = $jenisPemasukan[0]->jenis_pemasukan;
            $data['jenis_setoran'] = $namaJenisPemasukan;

            if ($request->file('picture_path_slip_setoran_iuran')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_setoran_iuran');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/slip/setoran/iuran/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_slip_setoran_iuran'] = $nama_file;
            }

            IuranPiki::create($data);
            return redirect()->route('iuran', $request->id)->with('success', 'Iuran Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->jenis_setoran == 2) {
            $data = $request->except('_token');
            $data['tanggal'] = now();
            $dataRupiah = $request->jumlah;
            $rupiah = str_replace(".", "", $dataRupiah);
            $data['jumlah'] = $rupiah;

            if ($request->file('picture_path_slip_setoran_iuran')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_setoran_iuran');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_slip_setoran_iuran'] = $nama_file;
            }

            $jenisPemasukan = jenisPemasukan::where('id', $request->jenis_setoran)->get();
            $namaJenisPemasukan = $jenisPemasukan[0]->jenis_pemasukan;
            $data['jenis_setoran'] = $namaJenisPemasukan;

            $data['status'] = 'sumbangan baru';


            IuranPiki::create($data);
            return redirect()->route('iuran', $request->id)->with('success', 'Sumbangan Berhasil Dilakukan, Terima Kasih !');
        }
    }

    public function backendHeader($userid)
    {
        $header = HeaderPiki::get();
        $headerMobile = HeaderPikiMobile::get();
        $userId = auth()->user()->id;
        $user = User::where('id', $userid)->first();
        return view('admin/backendHeaderViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('header admin'),
            "creator" => $userId,
            'header' => $header,
            'headerMobile' => $headerMobile,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,

        ]);
    }

    public function landingpageberita($userid)
    {
        // return $userid;
        $berita = NewsPiki::all();
        $categoryNews = CategoryNews::all();
        $user = User::where('id', $userid)->first();
        return view('admin/backendBeritaViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Berita",
            "creator" => auth()->user()->id,
            "berita" => $berita,
            "categoryNews" => $categoryNews,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function editberita(NewsPiki $newsPiki, $userid, $newsid)
    {
        // $newsPiki = NewsPiki::where('id',$id)->get();
        // return $id;
        $newsPiki = NewsPiki::find($newsid);
        // return $newsPiki;
        // return $newsPiki->id;
        $categoryNews = CategoryNews::all();
        $user = User::where('id', $userid)->first();
        return view('admin/backendFormBeritaViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Berita",
            "creator" => "San",
            "newsPiki" => $newsPiki,
            "categoryNews" => $categoryNews,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function landingpagejenisprogram($userid)
    {
        $program = ProgramPiki::get();
        $user = User::where('id', $userid)->first();
        return view('admin/backendFormProgramViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Program",
            "creator" => auth()->user()->id,
            "program" => $program,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function landingpageagenda($userid)
    {
        $agenda = AgendaPiki::get();
        $user = User::where('id', $userid)->first();
        return view('admin/backendAgendaViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Agenda",
            "creator" => auth()->user()->id,
            "agenda" => $agenda,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function editAgendaViaUser(AgendaPiki $agendaPiki, $userid, $agendaid)
    {
        // return $agendaid;
        $agendaPiki = AgendaPiki::find($agendaid);
        $user = User::where('id', $userid)->first();
        return view('admin/backendFormAgendaViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Agenda",
            "creator" => "San",
            "agendaPiki" => $agendaPiki,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function backendanggota($userid)
    {

        $idUser = auth()->user()->id;
        $user = User::where('id', $userid)->first();
        // return $user->city;
        // return view('admin/backendAnggotaViaUser', [
        //     "title" => "PIKI - Sangrid",
        //     "menu" => "Anggota",
        //     "creator" => $idUser,
        //     'item' => $user,
        //     'user' => $user,
        //     'userid' => $userid,
        // ]);
        $provinces = Province::where('name', $user->province)->first();
        $cities = Regency::where('name', $user->city)->first();
        $userDiterima = User::where('status_anggota', 'diterima')->where('city', $cities->name)->get();
        // return $cities;
        return view('admin/backendAnggotaViaUserPerKabupaten', [
            "title" => "PIKI - Sangrid",
            "menu" => "Anggota",
            "creator" => $idUser,
            "provinces" => $provinces,
            "cities" => $cities,
            'userDiterima' => $userDiterima,
            'item' => $user,
            'user' => $user,
            'userid' => $userid,
        ]);
    }

    public function backendCommunitypartnersViaUser($userid)
    {
        $sponsor = SponsorPiki::take(7)->get();
        $user = User::where('id', $userid)->first();
        return view('admin/backendCommunityPartnersViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Community Partners",
            "creator" => auth()->user()->id,
            "sponsor" => $sponsor,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function editCommunityPartnersViaUser(SponsorPiki $sponsorPiki, $userid, $partnersid)
    {
        $sponsorPiki = SponsorPiki::find($partnersid);
        $user = User::where('id', $userid)->first();
        return view('admin/backendFormCommunityPartnersViaUser', [
            "title" => "PIKI - Sangrid",
            "menu" => "Community Partners",
            "creator" => "San",
            "sponsorPiki" => $sponsorPiki,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendKeuanganViaUser($userid)
    {
        $urlNavbarKeuanganViaUser = true;
        $user = User::where('id', $userid)->first();
        return view('admin/backendKeuanganViaUser', [
            "urlNavbarKeuanganViaUser" => $urlNavbarKeuanganViaUser,
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Keuangan PIKI SUMUT',
            "creator" => auth()->user()->id,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendDataRekeningBankViaUser($userid)
    {
        $user = User::where('id', $userid)->first();
        $dataIuran = DataBankIuran::all();
        return view('admin/backendDataRekeningBankViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('Pengaturan Rekening Bank PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormEditDataRekeningBankViaUser($userid, $datarekeningid)
    {
        $user = User::where('id', $userid)->first();
        $dataIuran = DataBankIuran::find($datarekeningid);
        // return $dataIuran;
        $namaUser = auth()->user()->name;
        return view('admin/backendFormDataRekeningBankViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
            'namaUser' => $namaUser,
            'action' => 'edit',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendDataBiayaIuranViaUser($userid)
    {
        $user = User::where('id', $userid)->first();
        $dataIuran = DataBiayaIuran::all();
        return view('admin/backendDataBiayaIuranViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('pengaturan besaran Biaya Iuran PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormAddDataBiayaIuranViaUser(DataBiayaIuran $dataBiayaIuran, $userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        return view('admin/backendFormDataBiayaIuranViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'dataIuran' => $dataBiayaIuran,
            'namaUser' => $namaUser,
            'action' => 'add',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormEditDataBiayaIuranViaUser($userid, $dataiuranid)
    {
        $user = User::where('id', $userid)->first();
        $dataIuran = DataBiayaIuran::find($dataiuranid);
        $namaUser = auth()->user()->name;
        return view('admin/backendFormDataBiayaIuranViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
            'namaUser' => $namaUser,
            'action' => 'edit',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendMasterMenuNavbarKeuanganViaUser($userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        return view('admin/backendMasterMenuNavbarKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('master menu navbar PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'add',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormEditMasterMenuNavbarKeuanganViaUser($userid,$menunavbarid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::find($menunavbarid);
        return view('admin/backendFormEditMasterMenuNavbarKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form edit menu navbar PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'edit',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendSubMenuNavbarKeuanganViaUser($userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::with('masterMenuNavbarKeuangan')->get();
        return view('admin/backendSubMenuNavbarKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('sub menu navbar PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'add',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormAddSubMenuNavbarKeuanganViaUser(SubMenuNavbarKeuangan $subMenuNavbarKeuangan, $userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        return view('admin/backendFormSubMenuNavbarKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('tambah sub menu navbar PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'add',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormEditSubMenuNavbarKeuanganViaUser($userid, $submenuid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::find($submenuid);
        return view('admin/backendFormSubMenuNavbarKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('tambah sub menu navbar PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'edit',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormInputViaUser(Pendapatan $pendapatan, $userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $dataRekening = DataRekening::latest()->first();
        $jenisPemasukan = jenisPemasukan::all();
        $dataBiayaIuran = DataBiayaIuran::latest()->first();
        $userDiterima = User::where('status_anggota', 'diterima')->get();
        $jenisPengeluaran = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 1)->get();
        return view('admin/backendFormInputViaUser', [
            "title" => "PIKI - Iuran",
            "menu" => ucwords("input pendapatan"),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'userDiterima' => $userDiterima,
            'pendapatan' => $pendapatan,
            'dataRekening' => $dataRekening,
            'jenisPemasukan' => $jenisPemasukan,
            'dataBiayaIuran' => $dataBiayaIuran,
            'namaUser' => $namaUser,
            'action' => 'add',
            'jenisPengeluaran' => $jenisPengeluaran,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendFormAddPengeluaranViaUser(Pengeluaran $Pengeluaran, $userid)
    {
        $user = User::where('id', $userid)->first();
        $namaUser = auth()->user()->name;
        $posAnggaran = PosAnggaran::get();
        $jenisPengeluaran = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 2)->get();
        return view('admin/backendFormAddPengeluaranViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form tambah pengeluaran rutin PIKI SUMUT'),
            "creator" => auth()->user()->id,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'Pengeluaran' => $Pengeluaran,
            'jenisPengeluaran' => $jenisPengeluaran,
            'namaUser' => $namaUser,
            'action' => 'add',
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }

    public function backendLaporanKeuanganViaUser(NamaKegiatan $namaKegiatan, $userid)
    {
        $user = User::where('id', $userid)->first();
        $posAnggaran = PosAnggaran::get();
        $laporanKeuangan = LaporanKeuangan::get();
        $jenisPemasukan = jenisPemasukan::get();
        $sumbangan = SumbanganPiki::where('status','sumbangan terverifikasi')->sum('jumlah');
        $pendapatan = Pendapatan::groupBy('jenis_pendapatan','tanggal')
        ->selectRaw('tanggal,jenis_pendapatan, sum(jumlah) as sum')->whereMonth('tanggal',date('m'))
        ->get();

        $Pengeluaran = Pengeluaran::groupBy('pos_anggaran','tanggal')
        ->selectRaw('tanggal,pos_anggaran, sum(jumlah) as sum')->whereMonth('tanggal',date('m'))
        ->get();
        return view('admin/backendLaporanKeuanganViaUser', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Laporan Keuangan PIKI SUMUT',
            "creator" => auth()->user()->id,
            'keuangan' => 'keuangan',
            'posAnggaran' => $posAnggaran,
            'namaKegiatan' => $namaKegiatan,
            'laporanKeuangan' => $laporanKeuangan,
            'jenisPemasukan' => $jenisPemasukan,
            'sumbangan' => $sumbangan,
            'Pengeluaran' => $Pengeluaran,
            'pendapatan' => $pendapatan,
            'userid' => $userid,
            'item' => $user,
            'user' => $user,
        ]);
    }
}
