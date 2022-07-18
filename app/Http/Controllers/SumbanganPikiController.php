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
            "title" => "PIKI - Sumbangan",
            "menu" => "Sumbangan",
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
        if ($request->provinsi == 'Pilih Provinsi Anda') {
            $dataRupiah = $request->jumlah_sumbangan;
            $rupiah = str_replace(".","",$dataRupiah);
            $data = $request->except(['_token', 'provinsi', 'kabupaten', 'kecamatan', 'desa']);
            $data['jumlah_sumbangan'] = $rupiah;

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

        $dataRupiah = $request->jumlah_sumbangan;
        $rupiah = str_replace(".","",$dataRupiah);
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

    public function pemasukanSumbanganViaBendahara($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = SumbanganPiki::find($id);
        return view('admin/pemasukanSumbanganViaBendahara', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiBendahara(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah_sumbangan'] = $rupiahHapusSimbolRp;
            $data['status_sumbangan'] = 'sumbangan diproses';
            $data['status_verifikasi_bendahara'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);


            return redirect()->route('backend.sumbangan.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function postPemasukanSumbanganDiverifikasiBendaharaViaForm(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = SumbanganPiki::find($request->id);
            $dataRupiah = $data->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah_sumbangan' => $rupiahHapusSimbolRp,
                    'status_sumbangan' => 'sumbangan diproses',
                    'status_verifikasi_bendahara' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function pemasukanSumbanganViaKetua($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanSumbangan = SumbanganPiki::find($id);
        return view('admin/pemasukanSumbanganViaKetua', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $pemasukanSumbangan,
            'item' => $pemasukanSumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiKetua(Request $request)
    {
        $iuran = SumbanganPiki::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah_sumbangan'] = $rupiahHapusSimbolRp;
            $data['status_sumbangan'] = 'sumbangan diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function postPemasukanSumbanganDiverifikasiKetuaViaForm(Request $request)
    {
        $data = SumbanganPiki::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah_sumbangan' => $rupiahHapusSimbolRp,
                    'status_sumbangan' => 'sumbangan diproses',
                    'status_verifikasi_ketua' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function pemasukanSumbanganViaSpi($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = SumbanganPiki::find($id);
        return view('admin/pemasukanSumbanganViaSpi', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiSpi(Request $request)
    {
        // return $request;
        $iuran = SumbanganPiki::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi' && $iuran->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah_sumbangan'] = $rupiahHapusSimbolRp;
            $data['status_sumbangan'] = 'sumbangan terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanSumbanganDiverifikasiSpiViaForm(Request $request)
    {
        $data = SumbanganPiki::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah_sumbangan;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah_sumbangan' => $rupiahHapusSimbolRp,
                    'status_sumbangan' => 'sumbangan terverifikasi',
                    'status_verifikasi_spi' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanSumbanganDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status_sumbangan'] = 'sumbangan ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $sumbangan = SumbanganPiki::find($request->id);
        if ($sumbangan->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan sudah pernah telah ditolak');
        }

    }

    public function postPemasukanSumbanganDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        SumbanganPiki::where('id', $request->id)
        ->update($data);
        $iuran = SumbanganPiki::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->back()->with('success', 'Sumbangan telah dihapus');
    }
}
