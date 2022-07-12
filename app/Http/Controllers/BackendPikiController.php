<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BackendPiki;
use App\Models\IuranPiki;
use App\Models\jenisPemasukan;
use App\Models\SumbanganPiki;
use Illuminate\Http\Request;

class BackendPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = auth()->user()->id;
        return view('admin/index', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'keuangan PIKI SUMUT',
            "creator" => $user,
        ]);
    }

    public function notFound()
    {
        $user = auth()->user()->id;
        return view('admin/notfound', [
            "title" => "PIKI - Sangrid CRUD",
            "creator" => $user
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
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function show(BackendPiki $backendPiki, $id)
    {
        $item = User::find($id);
        return view('admin/index', [
            "title" => "PIKI - Sangrid CRUD",
            "creator" => "San",
            "item" => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendPiki $backendPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendPiki $backendPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendPiki $backendPiki)
    {
        //
    }

    public function keuangan()
    {
        $user = auth()->user()->id;
        return view('admin/keuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Keuangan PIKI SUMUT',
            "creator" => $user,
        ]);
    }

    public function pemasukan()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }

    public function rekapPemasukan()
    {
        $user = auth()->user()->id;
        $jenisPemasukan = jenisPemasukan::all();
        $rekapSumbangan = SumbanganPiki::get();
        // return $jenisPemasukan;
        return view('admin/rekapPemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Rekap Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'jenisPemasukan' => $jenisPemasukan,
            'nama' => 'sumbangan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSummary()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Summary PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }
    public function pemasukanIuran()
    {
        $user = auth()->user()->id;
        $pemasukanIuran = IuranPiki::all();
        return view('admin/pemasukanIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranBaru(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::where('status_iuran', 'iuran baru')->get();
        return view('admin/pemasukanIuranBaru', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Baru",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function postPemasukanIuranDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        IuranPiki::where('id', $request->id)
        ->update($data);
        $iuran = IuranPiki::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah dihapus');;
    }

    public function postPemasukanIuranDiverifikasiBendahara(Request $request)
    {
        // return $request->jumlah_iuran;
        $data = $request->except('_token');
        $dataRupiah = $request->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        $data['jumlah_iuran'] = $rupiahHapusSimbolRp;
        $data['status_iuran'] = 'iuran diproses';
        $data['status_verifikasi_bendahara'] = 'terverifikasi';
        IuranPiki::where('id', $request->id)
        ->update($data);


        return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah diverifikasi bendahara');
    }

    public function postPemasukanIuranDiverifikasiBendaharaViaForm(Request $request)
    {
        // return $dataIuran = IuranPiki::where('id', $request->id)->get();
        $data = IuranPiki::find($request->id);
        $dataRupiah = $data->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        IuranPiki::where('id', $request->id)
        ->update(
            [
                'jumlah_iuran' => $rupiahHapusSimbolRp,
                'status_iuran' => 'iuran diproses',
                'status_verifikasi_bendahara' => 'terverifikasi',
            ]
        );

        return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah diverifikasi bendahara');
    }

    public function pemasukanIuranDiverifikasiKetuaViaForm(Request $request)
    {
        // return $dataIuran = IuranPiki::where('id', $request->id)->get();
        $data = IuranPiki::find($request->id);
        $dataRupiah = $data->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        IuranPiki::where('id', $request->id)
        ->update(
            [
                'jumlah_iuran' => $rupiahHapusSimbolRp,
                'status_iuran' => 'iuran diproses',
                'status_verifikasi_ketua' => 'terverifikasi',
            ]
        );

        return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi Ketua');
    }

    public function pemasukanIuranDiverifikasiSpiViaForm(Request $request)
    {
        // return $dataIuran = IuranPiki::where('id', $request->id)->get();
        $data = IuranPiki::find($request->id);
        $dataRupiah = $data->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        IuranPiki::where('id', $request->id)
        ->update(
            [
                'jumlah_iuran' => $rupiahHapusSimbolRp,
                'status_iuran' => 'iuran terverifikasi',
                'status_verifikasi_spi' => 'terverifikasi',
            ]
        );

        return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi SPI');
    }

    public function postPemasukanIuranDiverifikasiKetua(Request $request)
    {
        $data = $request->except('_token');
        $dataRupiah = $request->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        // return $rupiahHapusSimbolRp;
        $data['jumlah_iuran'] = $rupiahHapusSimbolRp;
        $data['status_iuran'] = 'iuran diproses';
        $data['status_verifikasi_ketua'] = 'terverifikasi';
        IuranPiki::where('id', $request->id)
        ->update($data);
        return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi Ketua');
    }

    public function postPemasukanIuranDiverifikasiSpi(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $dataRupiah = $request->jumlah_iuran;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        // return $rupiahHapusSimbolRp;
        $data['jumlah_iuran'] = $rupiahHapusSimbolRp;
        $data['status_iuran'] = 'iuran terverifikasi';
        $data['status_verifikasi_spi'] = 'terverifikasi';
        IuranPiki::where('id', $request->id)
        ->update($data);
        return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi SPI');
    }

    public function pemasukanIuranDiproses(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::where('status_iuran', 'iuran diproses')->get();
        return view('admin/pemasukanIuranDiproses', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Di Proses",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function postPemasukanIuranDitolak(Request $request)
    {
        return $request;
    }

    public function pemasukanIuranDitolak(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::where('status_iuran', 'iuran ditolak')->get();
        return view('admin/pemasukanIuranDitolak', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Di Tolak",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function postPemasukanIuranDiterima(Request $request)
    {
        return $request;
    }

    public function pemasukanIuranDiterima(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::where('status_iuran', 'iuran terverifikasi')->get();
        return view('admin/pemasukanIuranDiterima', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Diterima",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }


    public function pemasukanIuranDetailViaBendahara($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::find($id);
        return view('admin/pemasukanIuranDetailViaBendahara', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Detail",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
            'item' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranDetailViaKetua($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::find($id);
        return view('admin/pemasukanIuranDetailViaKetua', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Detail",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
            'item' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranDetailViaSpi($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = IuranPiki::find($id);
        return view('admin/pemasukanIuranDetailViaSPi', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Iuran Detail",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
            'item' => $pemasukanIuran,
        ]);
    }

    public function pemasukanSumbangan()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanSumbangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganBaru()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanSumbanganBaru', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan Baru',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDiproses()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanSumbanganDiproses', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan Diproses',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDitolak()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanSumbanganDitolak', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan Ditolak',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDiterima()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanSumbanganDiterima', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan Diterima',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pengeluaran()
    {
        $user = auth()->user()->id;
        return view('admin/pengeluaranKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Keuangan PIKI SUMUT',
            "creator" => $user,
            'pengeluaranBaru' => 'keuangan',
            'diproses' => 'iuran',
            'ditolak' => 'iuran',
            'terverifikasi' => 'iuran',
        ]);
    }

    public function laporanKeuangan()
    {
        $user = auth()->user()->id;
        return view('admin/laporanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Laporan Keuangan PIKI SUMUT',
            "creator" => $user,
            'keuangan' => 'keuangan',
            'iuran' => 'iuran',
        ]);
    }
}
