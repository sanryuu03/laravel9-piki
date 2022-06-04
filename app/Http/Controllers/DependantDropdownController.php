<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class DependantDropdownController extends Controller
{
        public function wilayah(Request $request)
    {
        $provinces = Province::all();
        return view('wilayah', compact('provinces'));

    }

    public function provinces()
    {
        return Indonesia::allProvinces();
    }

    // public function cities(Request $request)
    // {
    //     return Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    // }
    public function cities(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $cities = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option>==Pilih Kota==</option>";
        foreach($cities as $city){
            $option .= "<option value='$city->id'>$city->name</option>";
        }
        echo $option;
    }

    public function districts(Request $request)
    {
        $id_kota = $request->id_kota;
        $district = District::where('regency_id', $id_kota)->get();
        $option = "<option>==Pilih Kabupaten==</option>";
        foreach($district as $kecamatan){
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function villages(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $village = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>==Pilih Desa==</option>";
        foreach($village as $desa){
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }
}
