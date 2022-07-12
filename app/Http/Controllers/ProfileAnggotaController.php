<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\AnggotaPiki;
use App\Models\TempAnggota;
use Illuminate\Http\Request;
use App\Models\ProfileAnggota;
use Illuminate\Support\Facades\Storage;
use App\Models\DataRekening;
use App\Models\IuranPiki;
use App\Models\jenisPemasukan;



class ProfileAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show(ProfileAnggota $profileAnggota, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        return view('admin/profileuser', [
            "title" => "PIKI - Sangrid",
            "menu" => "PIKI - CV Anggota",
            "creator" => $user,
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "view",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileAnggota  $profileAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileAnggota $profileAnggota)
    {
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/profile/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            User::where('id', $request->id)->update([
                'photo_profile' => $nama_file,
            ]);

            return redirect()->route('anggota.index')->with('success', 'profile berhasil di update');
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

            User::where('id', $request->id)->update([
                'photo_ktp' => $nama_file,
            ]);

            return redirect()->route('anggota.index')->with('success', 'ktp berhasil di update');
        }
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

        // return $data;
        TempAnggota::create(
            [
                'users_id' => $request->id,
                'name' => $request->name,
                'province' => $namaProvince,
                'city' => $namaKota,
                'district' => $namaKecamatan,
                'village' => $namaDesa,
                'job' => $request->job,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'jabatan_piki_sumut' => 'anggota',
            ]
        );

        User::where('id', $request->id)
            ->update($data);


        return redirect()->route('profile', $request->id)->with('success', 'CV telah diperbarui');
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

    public function iuran($id)
    {
        $anggotaPiki = AnggotaPiki::where('users_id', $id)->get();
        $user = User::find($id);
        $dataRekening = DataRekening::latest()->first();
        $jenisPemasukan = jenisPemasukan::all();
        // return $anggotaPiki[0]->name;
        return view('admin/iuranatausumbanganPiki', [
            "title" => "PIKI - Iuran",
            "menu" => "Iuran",
            "creator" => "San",
            'dataRekening' => $dataRekening,
            "anggotaPiki" => $anggotaPiki[0],
            "item" => $user,
            'jenisPemasukan' => $jenisPemasukan,
        ]);
    }

    public function saveIuran(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $namaBulan = $_POST['bulan'];
        $arrBulan = [];
        foreach ($namaBulan as $bulan){
            array_push($arrBulan, $bulan);
        }
        // return $arrBulan;
        // return $data['iuran_bulan'] = $arrBulan;
        // return implode(", ",$arrBulan);
        // return implode(", ",$data['iuran_bulan'] = $arrBulan);
        $data['iuran_bulan'] = implode(", ",$arrBulan);
        if (request()->input('jumlah_iuran')) {
            $dataRupiah = $request->jumlah_iuran;
            $rupiah = str_replace(".", "", $dataRupiah);
            $data['jumlah_iuran'] = $rupiah;
        }
        if (request()->input('jumlah_sumbangan')) {
            $dataRupiah = $request->jumlah_sumbangan;
            $rupiah = str_replace(".", "", $dataRupiah);
            $data['jumlah_sumbangan'] = $rupiah;
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
}
