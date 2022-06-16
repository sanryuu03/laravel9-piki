<?php

namespace App\Http\Controllers;

use App\Models\ProfileAnggota;
use Illuminate\Http\Request;
use App\Models\AnggotaPiki;
use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Storage;


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
            "menu" => "CV Anggota",
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
}
