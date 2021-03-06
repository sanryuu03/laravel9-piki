<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\AnggotaPiki;
use App\Models\KategoriAnggota;
use App\Models\SubKategoriAnggota;
use App\Models\TempAnggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Snappy\Facades\SnappyPdf; //import Fungsi PDF


class AnggotaPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
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
        View::share([
            'pendaftarBaru' => $pendaftarBaru,
            'dalamProses' => $dalamProses,
            'diTolak' => $diTolak,
            'anggotaDiterima' => $anggotaDiterima,
            'jabatanPikiSumut' => $jabatanPikiSumut,
            'anggotaYangDitampilkan' => $anggotaYangDitampilkan,
            'kategoriAnggota' => $kategoriAnggota,
            'subKategoriAnggota' => $subKategoriAnggota,
            "navbarAnggota" => $navbarAnggota,
        ]);

    }

    public function backendanggota()
    {

        $idUser = auth()->user()->id;

        return view('admin/backendanggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Anggota",
            "creator" => $idUser,
        ]);

    }

    public function index(Request $request)
    {
        // return $anggota;
        // return $anggota->name;
        // return $anggota[0]->name;
        // return $anggota->userPiki;
        $userDiterima = $this->userDiterima;
        $user = $userDiterima->skip(8);
        // $user = Datatables::of(User::query())->make(true);
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $user;

        return view('admin/landingpageanggota', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Anggota diterima"),
            "creator" => $idUser,
            "user" => $user,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);

    }

    public function pendaftarBaru(Request $request)
    {
        $user = $this->userBaru;
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $user;
        return view('admin/pendaftarBaru', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Pendaftar baru"),
            "creator" => $idUser,
            "user" => $user,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);
    }

    public function showProses(Request $request)
    {
        $user = $this->userDalamProses;
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $user;
        return view('admin/prosesPendaftarBaru', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Proses Pendaftar baru"),
            "creator" => $idUser,
            "user" => $user,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);
    }

    public function diTolak(Request $request)
    {
        $user = $this->userDiTolak;
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $user;
        return view('admin/tidakSesuaiPendaftarBaru', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Pendaftar baru tidak sesuai"),
            "creator" => $idUser,
            "user" => $user,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);
    }

    public function jabatanPIKISUMUT(Request $request)
    {
        $user = $this->userDiterima->skip(7);
        $anggota = AnggotaPiki::all();
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $anggota->id ;
        // foreach($anggota as $a) {
        //     return $a->userPiki->id ;
        // }
        return view('admin/jabatanpikisumut', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Jabatan PIKI SUMUT"),
            "creator" => $idUser,
            "user" => $user,
            "anggota" => $anggota,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);
    }


    public function editJabatanPIKISUMUT(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $idUser = auth()->user()->id;

        return view('admin/editjabatanpikisumut', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Jabatan PIKI SUMUT"),
            "creator" => $idUser,
            "item" => $anggotaPiki,
        ]);
    }

    public function updateJabatanPIKISUMUT(Request $request)
    {
        $anggotaPiki = AnggotaPiki::where('id', $request->id)->first();
        // return $anggotaPiki;
        AnggotaPiki::where('id', $request->id)
        ->update(['jabatan_piki_sumut' => $request->jabatan_piki_sumut]);

        $data = [
            'users_id' => $anggotaPiki->users_id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'diterima',
            'jabatan_piki_sumut' => $request->jabatan_piki_sumut,
        ];
        TempAnggota::create($data);

        return redirect()->route('jabatan.piki.sumut')->with('success', 'Jabatan berhasil di edit');
    }

    public function anggotaYangDitampilkan()
    {
        $anggota = $this->anggotaYangDitampilkan;
        $idUser = auth()->user()->id;
        // return $anggota->id ;
        // foreach($anggota as $a) {
        //     return $a->userPiki->id ;
        // }
        return view('admin/anggotaYangDitampilkan', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Anggota Yang Ditampilkan Pada Landing Page"),
            "creator" => $idUser,
            "anggota" => $anggota,
        ]);
    }

    public function pilihAnggotaYangDitampilkan()
    {
        $anggota = AnggotaPiki::all();
        $idUser = auth()->user()->id;
        // return $anggota->id ;
        // foreach($anggota as $a) {
        //     return $a->userPiki->id ;
        // }
        return view('admin/pilihAnggotaYangDitampilkan', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Pilih Anggota Yang Ditampilkan Pada Landing Page"),
            "creator" => $idUser,
            "anggota" => $anggota,
        ]);
    }

    public function jadikanAnggotaYangDitampilkan(Request $request)
    {

        $anggotaPiki = AnggotaPiki::where('id', $request->id)->first();

        $data = [
            'users_id' => $anggotaPiki->users_id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'diterima',
            'jabatan_piki_sumut' => $request->jabatan_piki_sumut,
            'tampilkan_anggota_dilandingpage' => 'ya',
        ];
        if (count($this->anggotaYangDitampilkan) < 3) {
            if ($anggotaPiki->tampilkan_anggota_dilandingpage == 'ya') {
                return redirect()->route('anggota.yang.ditampilkan')->with('error', 'Anggota sudah ditampilkan di landing page');
            }
            TempAnggota::create($data);

            AnggotaPiki::where('id', $request->id)
            ->update(['tampilkan_anggota_dilandingpage' => 'ya']);

            return redirect()->route('anggota.yang.ditampilkan')->with('success', 'Anggota berhasil di tampilkan di landing page');
        }
        return redirect()->route('anggota.yang.ditampilkan')->with('error', 'maksimal 3 anggota yang dapat di tampilkan');
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
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function showPendaftarBaru(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("CV Pendaftar Baru"),
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showPendaftarBaru",
            "provinces" => $provinces,
        ]);
    }

    public function processPendaftarBaru(Request $request)
    {
        $anggotaPiki = User::where('id', $request->id)->first();
        User::where('id', $request->id)
            ->update(['status_anggota' => 'dalam proses']);

        $data = [
            'users_id' => $request->id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'dalam proses',
            'jabatan_piki_sumut' => 'anggota',
        ];

        TempAnggota::create($data);


        return redirect()->route('pendaftarBaru')->with('process', 'Pendaftar Baru Sedang Di Proses');
    }


    public function showProsesUser(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Proses CV Pendaftar Baru"),
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showProsesPendaftarBaru",
            "provinces" => $provinces,
        ]);
    }

    public function approvePendaftarBaru(Request $request)
    {
        $anggotaPiki = User::where('id', $request->id)->first();
        User::where('id', $request->id)
            ->update(['status_anggota' => 'diterima']);

        // return $anggotaPiki->name;
        $data = [
            'users_id' => $request->id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'diterima',
            'jabatan_piki_sumut' => 'anggota',
        ];

        TempAnggota::create($data);
        AnggotaPiki::create($data);


        return redirect()->route('pendaftarBaru')->with('success', 'Pendaftar Baru Berhasil Di Terima');
    }

    public function menuDalamProsesapprovePendaftarBaru(Request $request)
    {
        $anggotaPiki = User::where('id', $request->id)->first();
        User::where('id', $request->id)
            ->update(['status_anggota' => 'diterima']);

        // return $anggotaPiki->name;
        $data = [
            'users_id' => $request->id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'diterima',
            'jabatan_piki_sumut' => 'anggota',
        ];

        TempAnggota::create($data);
        AnggotaPiki::create($data);


        return redirect()->route('dalamProses')->with('success', 'Pendaftar Baru Berhasil Di Terima');
    }

    public function showUserTidakSesuai(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("CV Yang Di Tolak"),
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showUserTidakSesuai",
            "provinces" => $provinces,
        ]);
    }

    public function diTolakUser(Request $request)
    {
        $anggotaPiki = User::where('id', $request->id)->first();

        $data = [
            'users_id' => $request->id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'tidak sesuai',
            'jabatan_piki_sumut' => 'anggota',
            'alasan_ditolak' => $request->alasan_ditolak,
        ];

        TempAnggota::create($data);

        User::where('id', $request->id)
            ->update([
                'status_anggota' => 'tidak sesuai',
                'alasan_ditolak' => $request->alasan_ditolak,
            ]);

            return redirect()->route('pendaftarBaru')->with('unapproved', 'Pendaftar Baru Di Tolak');
    }

    public function menuDalamProsesdiTolakUser(Request $request)
    {
        $anggotaPiki = User::where('id', $request->id)->first();

        $data = [
            'users_id' => $request->id,
            'name' => $anggotaPiki->name,
            'province' => $anggotaPiki->province,
            'city' => $anggotaPiki->city,
            'district' => $anggotaPiki->district,
            'village' => $anggotaPiki->village,
            'job' => $anggotaPiki->job,
            'address' => $anggotaPiki->address,
            'phone_number' => $anggotaPiki->phone_number,
            'status_anggota' => 'tidak sesuai',
            'jabatan_piki_sumut' => 'anggota',
            'alasan_ditolak' => $request->alasan_ditolak,
        ];

        TempAnggota::create($data);

        User::where('id', $request->id)
            ->update([
                'status_anggota' => 'tidak sesuai',
                'alasan_ditolak' => $request->alasan_ditolak,
            ]);

        return redirect()->route('dalamProses')->with('unapproved', 'Pendaftar Baru Di Tolak');
    }

    public function show(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("CV Anggota"),
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "view",
            "provinces" => $provinces,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $id = $request->value;
        $provinces = Province::all();
        // penggunaan http://192.168.1.7:8000/admin/landingpageanggota/edit/1?value=heheh
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Edit CV Anggota"),
            "creator" => "San",
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "id" => $id,
            "action" => "edit",
            "provinces" => $provinces,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaPiki $anggotaPiki)
    {
        // return $request;
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/profile/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            User::where('id', $request->id)->update([
                'photo_profile' => $nama_file,
            ]);

            return redirect()->route('anggota.index')->with('success', 'Jabatan berhasil di edit');
        } else {
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

            $province = request()->input('province');
            if ($province) {
                $province = Province::where('id', $province)->first();
                $namaProvince = $province->name;
                $data['province'] = $namaProvince;
            }

            $regencies = request()->input('city');
            if ($regencies) {
                $kota = Regency::where('id', $regencies)->first();
                $namaKota = $kota->name;
                $data['city'] = $namaKota;
            }

            $districts = request()->input('district');
            if ($districts) {
                $kecamatan = District::where('id', $districts)->first();
                $namaKecamatan = $kecamatan->name;
                $data['district'] = $namaKecamatan;
            }

            $villages = request()->input('village');
            if ($villages) {
                $desa = Village::where('id', $villages)->first();
                $namaDesa = $desa->name;
                $data['village'] = $namaDesa;
            }

    // return $data;
            User::where('id', $request->id)
                ->update($data);


            return redirect()->route('anggota.index')->with('success', 'Jabatan berhasil di edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaPiki $anggotaPiki, $id)
    {
        $user = User::find($id);
        if ($user->picture_path) {
            Storage::delete($user->picture_path);
        }
        $user->delete();
        return redirect()->back()->with('success', 'Data has been deleted !');
    }

    public function export($id)
    {
        $user = User::find($id);

        return view('admin/printcv', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("Print CV Anggota"),
            "creator" => "San",
            "item" => $user,
            "id" => $id,
            "action" => "print",
        ]);

        // $pdf = SnappyPdf::loadView('admin/printcv', $data);

        //Aktifkan Local File Access supaya bisa pakai file external ( cth File .CSS )
        // $pdf->setOption('enable-local-file-access', true);

        // Stream untuk menampilkan tampilan PDF pada browser
        // return $pdf->stream('anggotacv.pdf');

        // Jika ingin langsung download (tanpai melihat tampilannya terlebih dahulu) kalian bisa pakai fungsi download
        // return $pdf->download('anggotacv.pdf');
    }

    public function exportTable(Request $request)
    {
        // return $request->input('province');
        // return $_POST['table-filter'];
        // $id_provinsi = $request->id_provinsi;
        // $id_provinsi = $request->input('province');
        // $cities = Regency::where('province_id', $id_provinsi)->get();
        // return $id_provinsi;
        // return $cities;
        // return $_GET['table-filter'];
        $item = 'Province || Kab/Kota';
        // return $namaProvince;
        $province = request()->input('province');
        // if ($province) {
        //     $province = Province::where('id', $province)->first();
        //     $namaProvince = $province->name;
        //     $user = User::where('province', $namaProvince)->get();
        //     $item = $namaProvince;
        //     // return $user;
        //     $pdf = Pdf::loadView('admin/table', compact('user', 'item'));
        //     $pdf->setPaper('A4', 'potrait');
        //     return $pdf->stream('table.pdf');
        // }
        $regencies = request()->input('kota');
        // if ($regencies) {
        //     $kota = Regency::where('id', $regencies)->first();
        //     $namaKota = $kota->name;
        //     $user = User::where('city', $namaKota)->get();
        //     $item = $namaKota;
        //     // return $user;
        //     $pdf = Pdf::loadView('admin/table', compact('user', 'item'));
        //     $pdf->setPaper('A4', 'potrait');
        //     return $pdf->stream('table.pdf');
        // }
        // return $request->input();
        if ($province != null && $regencies != "==Pilih Kota==") {

            // return $regencies;
            $kota = Regency::where('id', $regencies)->first();
            $namaKota = $kota->name;
            $user = User::where('city', $namaKota)->get();
            $item = $namaKota;
            // return $user;
            $pdf = Pdf::loadView('admin/table', compact('user', 'item'));
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream('table.pdf');
        }
        else
        {
            $province = Province::where('id', $province)->first();
            $namaProvince = $province->name;
            $user = User::where('province', $namaProvince)->get();
            $item = $namaProvince;
            // return $user;
            $pdf = Pdf::loadView('admin/table', compact('user', 'item'));
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream('table.pdf');
        }
        // return ([$namaProvince, $namaKota]);
        $user = User::get();
        // return $user;

        $pdf = Pdf::loadView('admin/table', compact('user', 'item'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('table.pdf');
    }
}
