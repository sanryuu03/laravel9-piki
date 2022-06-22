<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\AnggotaPiki;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\Datatables\Datatables;
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

        $hitungUserBaru = count($this->userBaru);
        $hitungUseruserDalamProses = count($this->userDalamProses);
        $hitungUserDiTolak = count($this->userDiTolak);
        $hitungUserDiterima = count($this->userDiterima->skip(7));
        // return $hitungUserDiterima;
        $pendaftarBaru = $hitungUserBaru > 0 ? $hitungUserBaru:0;
        $dalamProses = $hitungUseruserDalamProses > 0 ? $hitungUseruserDalamProses:0;
        $diTolak = $hitungUserDiTolak > 0 ? $hitungUserDiTolak:0;
        $anggotaDiterima = $hitungUserDiterima > 0 ? $hitungUserDiterima:0;
        // dd($pendaftarBaru);
        View::share([
            'pendaftarBaru' => $pendaftarBaru,
            'dalamProses' => $dalamProses,
            'diTolak' => $diTolak,
            'anggotaDiterima' => $anggotaDiterima,
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
        $user = $userDiterima->skip(7);
        // $user = Datatables::of(User::query())->make(true);
        $provinces = Province::all();
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $idUser = auth()->user()->id;
        // return $user;

        return view('admin/landingpageanggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Anggota diterima",
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
            "menu" => "Pendaftar baru",
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
            "menu" => "Proses Pendaftar baru",
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
            "menu" => "Pendaftar baru tidak sesuai",
            "creator" => $idUser,
            "user" => $user,
            "provinces" => $provinces,
            "cities" => $cities,
        ]);
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
            "menu" => "CV Pendaftar Baru",
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showPendaftarBaru",
            "provinces" => $provinces,
        ]);
    }

    public function processPendaftarBaru(Request $request)
    {
        User::where('id', $request->id)
            ->update(['status_anggota' => 'dalam proses']);


        return redirect()->route('pendaftarBaru');
    }

    public function showProsesUser(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "Proses CV Pendaftar Baru",
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showProsesPendaftarBaru",
            "provinces" => $provinces,
        ]);
    }

    public function approvePendaftarBaru(Request $request)
    {
        User::where('id', $request->id)
            ->update(['status_anggota' => 'diterima']);


        return redirect()->route('dalamProses');
    }

    public function showUserTidakSesuai(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "CV Yang Di Tolak",
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "showUserTidakSesuai",
            "provinces" => $provinces,
        ]);
    }

    public function diTolakUser(Request $request)
    {
        User::where('id', $request->id)
            ->update(['status_anggota' => 'tidak sesuai']);


        return redirect()->route('dalamProses');
    }

    public function show(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $provinces = Province::all();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "CV Anggota",
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
            "menu" => "Edit CV Anggota",
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

        if ($request->file('picture_path')) {
            // jika gambar lama ada, maka hapus gambar lama
            if ($request->picture_path) {
                Storage::delete($request->picture_path);
            }
            $data['photo_profile'] = $request->file('picture_path')->store('assets/user/profile');
            User::where('id', $request->id)
                ->update([
                    'photo_profile' => $data['photo_profile'],
                ]);
        }
// return $data;
        User::where('id', $request->id)
            ->update($data);


        return redirect()->route('anggota.index');
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
            "menu" => "Print CV Anggota",
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
