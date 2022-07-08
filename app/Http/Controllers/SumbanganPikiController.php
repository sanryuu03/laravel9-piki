<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\DataRekening;
use Illuminate\Http\Request;
use App\Models\SumbanganPiki;

class SumbanganPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $dataRekening = DataRekening::latest()->first();
        return view('sumbanganPiki', [
            "title" => "PIKI - Kategori Berita",
            "menu" => "Kategori Berita",
            "creator" => "San",
            'provinces' => $provinces,
            'dataRekening' => $dataRekening,
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
        // return $request;
        $dataRupiah = $request->jumlah_sumbangan;
        // return $rupiah = str_replace(",","",$dataRupiah);
        $rupiah = str_replace(",","",$dataRupiah);
        $data = $request->except('_token');
        $data['jumlah_sumbangan'] = $rupiah;
        $province = request()->input('provinsi');
        if ($province) {
            $province = Province::where('id', $province)->first();
            $namaProvince = $province->name;
            $data['provinsi'] = $namaProvince;
        }

        $regencies = request()->input('kota');
        if ($regencies) {
            $kota = Regency::where('id', $regencies)->first();
            $namaKota = $kota->name;
            $data['kabupaten'] = $namaKota;
        }

        $districts = request()->input('kecamatan');
        if ($districts) {
            $kecamatan = District::where('id', $districts)->first();
            $namaKecamatan = $kecamatan->name;
            $data['kecamatan'] = $namaKecamatan;
        }

        $villages = request()->input('desa');
        if ($villages) {
            $desa = Village::where('id', $villages)->first();
            $namaDesa = $desa->name;
            $data['desa'] = $namaDesa;
        }

        if ($request->file('picture_path_slip_setoran_sumbangan')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_slip_setoran_sumbangan');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['picture_path_slip_setoran_sumbangan'] = $nama_file;
        }

        SumbanganPiki::create($data);
        return redirect('/sumbanganPiki')->with('success', 'Sumbangan Berhasil Dilakukan, Terima Kasih !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function show(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumbanganPiki $sumbanganPiki)
    {
        //
    }
}
