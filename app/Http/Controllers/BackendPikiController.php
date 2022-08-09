<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendapatan;
use App\Models\BackendPiki;
use App\Models\PosAnggaran;
use App\Models\NamaKegiatan;
use Illuminate\Http\Request;
use App\Models\DataBankIuran;
use App\Models\SumbanganPiki;
use App\Models\jenisPemasukan;
use App\Models\LaporanKeuangan;
use App\Models\MasterMenuNavbar;
use App\Models\SubMenuNavbarKeuangan;

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
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'keuangan PIKI SUMUT',
            "creator" => $user,
        ]);
    }

    public function notFound()
    {
        $user = auth()->user()->id;
        return view('admin/notfound', [
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Keuangan PIKI SUMUT',
            "creator" => $user,
        ]);
    }

    public function pemasukan()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
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
        $pemasukanIuran = Pendapatan::all();
        return view('admin/pemasukanIuran', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pemasukan Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranBaru(Request $request)
    {
        // return auth()->user()->level;
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::where('status', 'baru')->get();
        return view('admin/pemasukanIuranBaru', [
            "title" => "PIKI - SUMUT",
            "menu" => "Pemasukan Iuran Baru",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function postPemasukanIuranDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        Pendapatan::where('id', $request->id)
        ->update($data);
        $iuran = Pendapatan::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah dihapus');
    }

    public function postPemasukanIuranDiverifikasiBendahara(Request $request)
    {
        // return $request->jumlah;
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.iuran.baru')->with('unapproved', 'Iuran belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.iuran.baru')->with('unapproved', 'Iuran belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_bendahara'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);


            return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah diverifikasi bendahara');
        }
    }

    public function postPemasukanIuranDiverifikasiBendaharaViaForm(Request $request)
    {
        // return $dataIuran = Pendapatan::where('id', $request->id)->get();
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.iuran.baru')->with('unapproved', 'Iuran belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.iuran.baru')->with('unapproved', 'Iuran belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = Pendapatan::find($request->id);
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_bendahara' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.iuran.baru')->with('success', 'Iuran telah diverifikasi bendahara');
        }
    }

    public function pemasukanIuranDiverifikasiKetuaViaForm(Request $request)
    {
        // return $dataIuran = Pendapatan::where('id', $request->id)->get();
        $data = Pendapatan::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_ketua' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran gagal diverifikasi Ketua');
        }
    }

    public function pemasukanIuranDiverifikasiSpiViaForm(Request $request)
    {
        // return $dataIuran = Pendapatan::where('id', $request->id)->get();
        $data = Pendapatan::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'terverifikasi',
                    'status_verifikasi_spi' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran gagal diverifikasi SPI');
        }
    }

    public function postPemasukanIuranDiverifikasiKetua(Request $request)
    {
        $iuran = Pendapatan::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran gagal diverifikasi Ketua');
        }
    }

    public function postPemasukanIuranDiverifikasiSpi(Request $request)
    {
        // return $request;
        $iuran = Pendapatan::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi' && $iuran->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.iuran.diproses')->with('success', 'Iuran telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran gagal diverifikasi SPI');
        }
    }

    public function pemasukanIuranDiproses(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::where('status', 'diproses')->get();
        return view('admin/pemasukanIuranDiproses', [
            "title" => "PIKI - SUMUT",
            "menu" => "Pemasukan Iuran Di Proses",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }

    public function postPemasukanIuranDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status'] = 'ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $iuran = Pendapatan::find($request->id);
        if ($iuran->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.iuran.ditolak')->with('success', 'Iuran telah ditolak');
        }
        elseif ($iuran->alasan_ditolak == null && $iuran->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($iuran->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.iuran.ditolak')->with('success', 'Iuran telah ditolak');
        }
        elseif ($iuran->alasan_ditolak == null && $iuran->status_verifikasi_bendahara == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($iuran->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.iuran.ditolak')->with('success', 'Iuran telah ditolak');
        }
        else {
            return redirect()->route('backend.iuran.diproses')->with('unapproved', 'Iuran sudah pernah telah ditolak');
        }

    }

    public function pemasukanIuranDitolak(Request $request)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::where('status', 'ditolak')->get();
        return view('admin/pemasukanIuranDitolak', [
            "title" => "PIKI - SUMUT",
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
        $pemasukanIuran = Pendapatan::where('status', 'terverifikasi')->get();
        return view('admin/pemasukanIuranDiterima', [
            "title" => "PIKI - SUMUT",
            "menu" => "Pemasukan Iuran Diterima",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
        ]);
    }


    public function pemasukanIuranDetailViaBendahara($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::find($id);
        return view('admin/pemasukanIuranDetailViaBendahara', [
            "title" => "PIKI - SUMUT",
            "menu" => "Pemasukan Iuran Detail",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
            'item' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranDetailViaKetua($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::find($id);
        return view('admin/pemasukanIuranDetailViaKetua', [
            "title" => "PIKI - SUMUT",
            "menu" => "Pemasukan Iuran Detail",
            "creator" => $idUser,
            'pemasukanIuran' => $pemasukanIuran,
            'item' => $pemasukanIuran,
        ]);
    }

    public function pemasukanIuranDetailViaSpi($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanIuran = Pendapatan::find($id);
        return view('admin/pemasukanIuranDetailViaSPi', [
            "title" => "PIKI - SUMUT",
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
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pemasukan Sumbangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganBaru()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = Pendapatan::where('status', 'baru')->get();
        return view('admin/pemasukanSumbanganBaru', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pemasukan baru',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDiproses()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = Pendapatan::where('status', 'diproses')->get();
        return view('admin/pemasukanSumbanganDiproses', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pemasukan diproses',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDitolak()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = Pendapatan::where('status', 'ditolak')->get();
        return view('admin/pemasukanSumbanganDitolak', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pemasukan ditolak',
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanSumbanganDiterima()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = Pendapatan::where('status', 'terverifikasi')->get();
        return view('admin/pemasukanSumbanganDiterima', [
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
            'menu' => 'Pengeluaran Keuangan PIKI SUMUT',
            "creator" => $user,
            'pengeluaranBaru' => 'keuangan',
            'diproses' => 'iuran',
            'ditolak' => 'iuran',
            'terverifikasi' => 'iuran',
        ]);
    }

    public function pemasukanDonasi()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/pemasukanDonasi', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('Pemasukan donasi PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanDonasiBaru()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::where('status', 'sumbangan baru')->get();
        return view('admin/pemasukanDonasiBaru', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('Pemasukan donasi baru'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanDonasiDiproses()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::where('status', 'diproses')->get();
        return view('admin/pemasukanDonasiDiproses', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('Pemasukan donasi diproses'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanDonasiDitolak()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::where('status', 'ditolak')->get();
        return view('admin/pemasukanDonasiDitolak', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('Pemasukan donasi ditolak'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanDonasiDiterima()
    {
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::where('status', 'terverifikasi')->get();
        return view('admin/pemasukanDonasiDiterima', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('Pemasukan donasi Diterima'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
        ]);
    }

    public function pemasukanDonasiEdit($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = SumbanganPiki::find($id);
        $tujuan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 1)->get();
        return view('admin/editPemasukanDonasi', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('edit donasi'),
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
            'tujuanSumbangan' => $tujuan,
        ]);
    }
}
